<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'description' => $this->faker->name,
            'description' => Str::random(10),
            'price' =>rand(2,50),
            'photo' => rand(3,100),
            'availablity' => rand(0, 1),
            'detail' =>Str::random(10),
        ];

    }
}
