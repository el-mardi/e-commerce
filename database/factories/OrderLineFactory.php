<?php

namespace Database\Factories;

use App\Models\OrderLine;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderLineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderLine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_cmd' =>  Order::inRandomOrder()->first()->id_cmd,
            'id_prd' =>  Product::inRandomOrder()->first()->id_prd,
            'prix' =>$this->faker->randomDigit(), 	
            'quantite' => $this->faker->numberBetween(1, 20),
        ];
    }
}
