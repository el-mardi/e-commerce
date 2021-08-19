<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use App\Models\Markdown;
use Illuminate\Database\Eloquent\Factories\Factory;


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
            'id_ctg'=> Category::inRandomOrder()->first()->id_ctg,	
            'nom'=> $this->faker->name(),	
            'prix'=>$this->faker->randomDigit(),	
            'quantite'=> $this->faker->numberBetween(0, 500),	
            'description'=> $this->faker->text(),
            'id_rem'=>MarkDown::inRandomOrder()->first()->id_rem,	
        ];
    }
}
