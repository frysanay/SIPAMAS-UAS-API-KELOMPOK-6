<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            ['status_name' => 'Menunggu Verifikasi', 'created_at' => now(), 'updated_at' => now()],
            ['status_name' => 'Diproses',            'created_at' => now(), 'updated_at' => now()],
            ['status_name' => 'Selesai',             'created_at' => now(), 'updated_at' => now()],
            ['status_name' => 'Ditolak',             'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('statuses')->insert($statuses);
    }
}
