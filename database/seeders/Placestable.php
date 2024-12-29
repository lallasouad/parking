<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Placestable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            
            Place::create(['cartype' => 'small']);
        }
        
        for ($i = 11; $i <= 20; $i++) {
          
            Place::create(['cartype' => 'BIG']);
        }

    }
}
