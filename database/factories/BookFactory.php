<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'author' => $this->faker->name,
            'publisher' => $this->faker->company,
            'isbn' => $this->faker->isbn13,
            'cover' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraph,
            'language' => $this->faker->languageCode,
            'pages' => $this->faker->numberBetween(100, 1000),
            'year' => $this->faker->year,
            'edition' => $this->faker->randomDigit,
            'size' => $this->faker->randomFloat(2, 1, 10),
            'weight' => $this->faker->randomFloat(2, 1, 10),
            'price' => $this->faker->randomFloat(2, 1, 10),
            'stock' => $this->faker->numberBetween(0, 100),
            'status' => $this->faker->boolean,
        ];
    }
}
