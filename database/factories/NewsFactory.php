<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3, 8),
            'image' => $this->faker->imageUrl(random_int(800, 1200), random_int(300, 400), 'tech'),
            'image_thumb' => $this->faker->imageUrl(300, 200),
            'image_thumb_square' => $this->faker->imageUrl(80, 80),
            'description' => $this->faker->sentence(10),
            'slug' => $this->faker->slug(3),
            'body' => collect($this->faker->paragraphs(mt_rand(5, 15)))
                ->map(fn ($p) => "<p>$p</p>")
                ->implode(''),
            'user_id' => random_int(1, 2),
            'is_published' => true
        ];
    }
}
