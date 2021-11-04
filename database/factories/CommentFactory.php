<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            //'id' => $this -> faker->randomDigit(),
            //'user_id' => $this -> faker->randomDigit(),
            //'post_id' => $this -> faker->randomDigit(),
            'body' => $this -> faker->sentence($nbWords = 6, true), 
            'created_at' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'updated_at' => $this->faker->time($format = 'H:i:s', $max = 'now')


        ];
    }
}
