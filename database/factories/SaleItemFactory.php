<?php

namespace Database\Factories;

use App\Models\SaleItem;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SaleItem>
 */
class SaleItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory()->create()->product_id,
            'sale_id' => Sale::factory()->create()->sale_id,
            'quantity' => $this->faker->numberBetween(1, 10),
        ];
    }
}
