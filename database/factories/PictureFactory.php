<?php

namespace Database\Factories;

use App\Models\Picture;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class PictureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Picture::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => $this->faker->image('public/img', 400, 300, null, false),
            'nom' =>$this->faker->name() ,	
            'id_prd' => Product::inRandomOrder()->first()->id_prd,	
            
        ];
    }
}
