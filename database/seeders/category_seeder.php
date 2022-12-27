<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class category_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Aksiyon', 'Bilim Kurgu', 'Korku', 'Komedi', 'Fantezi', 'Aşk', 'Müzikal', 'Dram'];
        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name'=>$category,
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}
