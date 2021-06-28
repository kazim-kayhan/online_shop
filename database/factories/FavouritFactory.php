<?php

namespace Database\Factories;

use App\Models\Favourit;
use Illuminate\Database\Eloquent\Factories\Factory;

class FavouritFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Favourit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id'=>$this->faker->numberBetween(1,22),
        ];
    }
}
