<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Setting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Anarsoft Technology Services Company',
            'slogan' => 'Booster of your e-commerce',
            'developer' => 'Mk Mohammadi',
            'email' => 'anarsoft@email.com',
            'phone' => '+93770038759',
            'phone2' => '+9373634343',
            'address' => 'Barchi City Walk, Dasht-e-Barchi, Kabul',
            'map' => '#',
            'twiter' => '#',
            'facebook' => '#',
            'github' => '#',
            'linkedin' => '#',
            'youtube' => '#'
        ];
    }
}
