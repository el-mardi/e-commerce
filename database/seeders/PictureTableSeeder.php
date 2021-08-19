<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Picture;

class PictureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Picture::factory()->count(10)->create();
        
    }
}
