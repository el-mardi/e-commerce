<?php

namespace Database\Factories;

use App\Models\MarkDown;
use Illuminate\Database\Eloquent\Factories\Factory;

class MarkDownFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MarkDown::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'statut'=> $this->faker->boolean(),	
            'pourcentage'=> $this->faker->numberBetween(0, 100),	
            'date_debut'=>now(),
            'date_fin'=> $this->faker->dateTimeInInterval('0 week', '+3 week')
        ];
    }
}
