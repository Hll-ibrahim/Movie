<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class director_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('directors')->insert([
            'name' => 'Boş Yönetmen',
            'image'=> 'https://eitrawmaterials.eu/wp-content/uploads/2016/09/person-icon.png',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
