<?php

namespace Database\Factories;

use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

class StateFactory extends Factory
{

    public $model = State::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'likes' => $this->faker->numberBetween(1000, 10000),
            'views' => $this->faker->numberBetween(10000, 100000),
        ];
    }
}
