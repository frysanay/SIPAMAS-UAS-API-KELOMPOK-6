<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['category_name' => 'Infrastruktur', 'created_at' => now(), 'updated_at' => now()],
            ['category_name' => 'Kebersihan',    'created_at' => now(), 'updated_at' => now()],
            ['category_name' => 'Keamanan',      'created_at' => now(), 'updated_at' => now()],
            ['category_name' => 'Fasilitas Umum','created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('categories')->insert($categories);
    }
}
