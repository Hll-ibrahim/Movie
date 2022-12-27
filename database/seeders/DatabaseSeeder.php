<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            category_seeder::class,
            director_seeder::class,
            auth_seeder::class,
            movie_seeder::class,
        ]);
    }
}
