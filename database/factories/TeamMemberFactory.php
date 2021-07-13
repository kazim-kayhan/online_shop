<?php

namespace Database\Factories;

use App\Models\TeamMember;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamMemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TeamMember::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->firstName(),
            'position'=>$this->faker->jobTitle,
            'introduction'=>$this->faker->text(200),
            'image'=> 'member-'.$this->faker->numberBetween(1,4).'.jpg',
            'image_alt'=>'member-'.$this->faker->numberBetween(1,4).'-photo',
        ];
    }
}
