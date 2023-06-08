<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class t_lazada extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fake = Faker::create();
        for ($i=0; $i < 10 ; $i++) { 
            DB::table('t_lazada')->insert([
                'name' => $fake->name,
                'image' => $fake->imageUrl(100, 100),
                'price' => $fake->numberBetween(10000,90000),
                'shopower' => $fake->text
            ]);
        }
    }
}
