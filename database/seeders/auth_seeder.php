<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class auth_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Roket Rakun',
            'email'=> 'hello@gmail.com',
            'password' => bcrypt(123456),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
