<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
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
    public function definition(): array
    {
        
        $seller = User::where('id',2)->first();
        $category = Category::inRAndomOrder()->first();

        return [
            'name' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2,200,100000),
            'image' => $this->faker->imageUrl(640, 480),
            'category_id' => $category->id,
            'seller_id' => $seller->id,
            'active' => 1,
        ];
    }
}
