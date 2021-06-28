<?php

namespace Database\Factories;

use App\Models\HomeSlider;
use Illuminate\Database\Eloquent\Factories\Factory;

class HomeSliderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HomeSlider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product_name = $this->faker->unique()->words($nb=2,$asText=true);
        return [
            'title'=>$product_name,
            'subtitle'=>$this->faker->text(200),
            'price'=>$this->faker->numberBetween(10,500),
            'link'=> '/shop',
            'image'=> 'main-slider-'.$this->faker->numberBetween(1,3).'-'.$this->faker->numberBetween(1,3).'.jpg',
        ];
    }
}
