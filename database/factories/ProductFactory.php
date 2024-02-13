<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'product_name' => $this->faker->word,
            'unit' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'description' => $this->faker->sentence,
            'category_id' => Category::factory()->create()->category_id,
        ];
    }
}
