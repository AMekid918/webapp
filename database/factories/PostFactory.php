<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'user_id' => $this -> faker -> numberBetween(1,10),
        'body' => $this -> faker->sentence($nbWords = 6, true),
        'image_path' => $this -> faker-> numberBetween(1,3),
        'created_at' => $this->faker->time($format = 'H:i:s', $max = 'now'),
        'updated_at' => $this->faker->time($format = 'H:i:s', $max = 'now')

        ];
    }
}
