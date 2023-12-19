<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'code' => $this->faker->unique()->text(10),
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'quantity' => $this->faker->numberBetween(1, 100),
            'inventory_status' => $this->faker->randomElement(['In Stock', 'Out of Stock']),
            'category' => $this->faker->word,
            'image' => $this->faker->imageUrl(),
            'rating' => $this->faker->numberBetween(1, 5),
        ];
    }
}
