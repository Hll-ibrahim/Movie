<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<10;$i++) {
            DB::table('movies')->insert([
                'name' => 'Avengers',
                'image' => 'https://lumiere-a.akamaihd.net/v1/images/p_avengersendgame_19751_e14a0104.jpeg?region=0%2C0%2C540%2C810',
                'director_id' => 1,
                'rating' => 7,
                'leadRole_id' => 1,
                'description' => 'Earth \'s mightiest heroes must come together and learn to fight as a team if they are going to stop the mischievous Loki and his alien army from enslaving humanity.',
                'category_id' => rand(1, 8),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
