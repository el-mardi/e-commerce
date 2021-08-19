<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderLine;


class OrderLineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderLine::factory()->count(10)->create();
        
    }
}
