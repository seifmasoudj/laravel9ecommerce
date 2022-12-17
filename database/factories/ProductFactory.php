<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $product_name= $this->faker->unique()->words($nb=4,$astext=true);
        $slug = Str::slug($product_name,'_');
        return [
            'name' => $product_name,
            'slug' => $slug,
            'short_description' => $this->faker->text(200),
            'description' => $this->faker->text(500),
            'regular_price' => $this->faker->numberBetween(10,500),
            'SKU' => 'DIGI'. $this->faker->unique()->numberBetween(100,500),
            'stock_status' => 'Instock',
            'quality' => $this->faker->numberBetween(10,50),
            'image' => 'product-'. $this->faker->unique()->numberBetween(1,16).'.jpg',
            'category_id' => $this->faker->numberBetween(1,5)
        ]; 
    }
}
