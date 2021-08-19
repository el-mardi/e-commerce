<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MarkDown;


class MarkDownTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MarkDown::factory()->count(10)->create();
        
    }
}
