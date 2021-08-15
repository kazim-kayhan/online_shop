<?php

namespace App\Http\Livewire;

use App\Mail\OrderMail;
use Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Stripe;

class CheckoutComponent extends Component
{
    public $ship_to_different;

    public $firstName;
    public $lastName;
    public $email;
    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $zipcode;

    public $s_firstName;
    public $s_lastName;
    public $s_email;
    public $s_mobile;
    public $s_line1;
    public $s_line2;
    public $s_city;
    public $s_province;
    public $s_country;
    public $s_zipcode;

    public $paymentMode;
    public $thankyou;

    public $card_no;
    public $exp_month;
    public $exp_year;
    public $cvc;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line1' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'paymentMode' => 'required',
       ]);

        if ($this->ship_to_different) {
            $this->validateOnly($fields, [
            's_firstName' => 'required',
            's_lastName' => 'required',
            's_email' => 'required|email',
            's_mobile' => 'required|numeric',
            's_line1' => 'required',
            's_city' => 'required',
            's_province' => 'required',
            's_country' => 'required',
            's_zipcode' => 'required',
           ]);
        }
        if ($this->paymentMode == 'card') {
            $this->validateOnly($fields, [
            'card_no' => 'required|numeric',
            'exp_month' => 'required|numeric',
            'exp_year' => 'required|numeric',
            'cvc' => 'required|numeric'
        ]);
        }
    }

    public function placeOrder()
    {
        $this->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line1' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'paymentMode' => 'required',
       ]);

        if ($this->paymentMode == 'card') {
            $this->validate([
            'card_no' => 'required|numeric',
            'exp_month' => 'required|numeric',
            'exp_year' => 'required|numeric',
            'cvc' => 'required|numeric'
        ]);
        }

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->discount = session()->get('checkout')['discount'];
        $order->tax = session()->get('checkout')['tax'];
        $order->total = session()->get('checkout')['total'];
        $order->firstName = $this->firstName;
        $order->lastName = $this->lastName;
        $order->email = $this->email;
        $order->mobile = $this->mobile;
        $order->line1 = $this->line1;
        $order->line2 = $this->line2;
        $order->city = $this->city;
        $order->province = $this->province;
        $order->country = $this->country;
        $order->zipcode = $this->zipcode;
        $order->status = 'ordered';
        $order->is_shipping_different = $this->ship_to_different ? 1:0 ;
        $order->save();

        foreach (Cart::instance('cart')->content() as $item) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }
        if ($this->ship_to_different) {
            $this->validate([
               's_firstName' => 'required',
               's_lastName' => 'required',
               's_email' => 'required|email',
               's_mobile' => 'required|numeric',
               's_line1' => 'required',
               's_city' => 'required',
               's_province' => 'required',
               's_country' => 'required',
               's_zipcode' => 'required',
           ]);
            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->firstName = $this->s_firstName;
            $shipping->lastName = $this->s_lastName;
            $shipping->email = $this->s_email;
            $shipping->mobile = $this->s_mobile;
            $shipping->line1 = $this->s_line1;
            $shipping->line2 = $this->s_line2;
            $shipping->city = $this->s_city;
            $shipping->province = $this->s_province;
            $shipping->country = $this->s_country;
            $shipping->zipcode = $this->s_zipcode;
            $shipping->save();
        }

        if ($this->paymentMode == 'cod') {
            $this->makeTransaction($order->id, 'pending');
            $this->resetCart();
        } elseif ($this->paymentMode == 'card') {
            $stripe = Stripe::make(env('STRIPE_KEY'));
            try {
                $token= $stripe->tokens()->create([
                    'card' => [
                        'number' => $this->card_no,
                        'exp_month' => $this->exp_month,
                        'exp_year' => $this->exp_year,
                        'cvc' => $this->cvc
                    ]
                ]);
                if (!isset($token['id'])) {
                    session()->flash('stripe_error', 'The stripe token was not generated correctly!');
                    $this->thank = 0;
                }
                $customer = $stripe->customers()->create([
                    'name' => $this->firstName . ' ' . $this->lastName,
                    'email' => $this-> email,
                    'phon' => $this->mobile,
                    'address' =>[
                        'line1' => $this->line1,
                        'postal_code' => $this->zipcode,
                        'city' => $this->city,
                        'state' => $this->province,
                        'country' => $this->country
                    ],
                    'shipping' =>[
                        'name' => $this->firstName . ' ' . $this->lastName,
                        'address' =>[
                            'line1' => $this->line1,
                            'postal_code' => $this->zipcode,
                            'city' => $this->city,
                            'state' => $this->province,
                            'country' => $this->country
                        ],
                    ],
                    'source' => $token['id']
                ]);

                $charge = $stripe->charges()->create([
                    'coustomer' => $this-> $customer['id'],
                    'currency' =>  'USD',
                    'amount' => session()->get('checkout')['total'],
                    'description' => 'Payment for order no ' . $order->id
                ]);
                if ($charge['status'] == 'succeeded') {
                    $this->makeTransaction($order->id, 'approved');
                    $this->resetCart();
                } else {
                    session()->flash('srtipe_error', 'Error if Transantion!');
                    $this->thankyou = 0;
                }
            } catch (Exception $e) {
                session()->flash('stripe_error', $e->getMessage());
                $this->thankyou = 0;
            }
        }
        $this->sendOrderConfirmationMail($order);
    }
    public function resetCart()
    {
        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }

    public function takeTransaction($order_id, $status)
    {
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->order_id = $order_id;
        $transaction->mode = 'cod';
        $transaction->status = $status;
        $transaction->save();
    }

    public function sendOrderConfirmationMail($order){
        Mail::to($order->email())->send(new OrderMail($order));
    }

    public function verifyForCheckout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } elseif ($this->thankyou) {
            return redirect()->route('thankyou');
        } elseif (!session()->get('checkout')) {
            return redirect()->route('product.cart');
        }
    }

    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.checkout-component')->layout('layouts.base');
    }
}