<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => $this->faker->sentence(),
            "description" => $this->faker->text(50),
            "preview" => $this->faker->text(50),
            "thumbnail" => $this->faker->image("public/storage/posts"),
        ];
    }
}
