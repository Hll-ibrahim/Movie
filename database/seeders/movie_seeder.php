<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class movie_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ["Interstellar","Inseption","The Martian"];
        $images = ["https://tr.web.img2.acsta.net/pictures/14/10/09/15/52/150664.jpg",
                "https://m.media-amazon.com/images/M/MV5BMjAxMzY3NjcxNF5BMl5BanBnXkFtZTcwNTI5OTM0Mw@@._V1_.jpg",
                "https://m.media-amazon.com/images/M/MV5BMTc2MTQ3MDA1Nl5BMl5BanBnXkFtZTgwODA3OTI4NjE@._V1_.jpg"];
        for($i=0;$i<3;$i++) {
            DB::table('movies')->insert([
                'name' => $names[$i],
                'image' => $images[$i],
                'rating' => 7,
                'description' => 'Earth \'s mightiest heroes must come together and learn to fight as a team if they are going to stop the mischievous Loki and his alien army from enslaving humanity.',
                'director_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
