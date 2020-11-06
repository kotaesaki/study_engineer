<?php

namespace Database\Factories;

use App\Models\Form;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
// use Faker\Generator as Faker;

class FormFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Form::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 2,
            'category' => $this->faker->word,
            'content' => $this->faker->realText,
            'working_time' => $this->faker->dateTime
        ];
    }
}
