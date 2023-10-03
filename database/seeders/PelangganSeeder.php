<?php

namespace Database\Seeders;

use App\Models\pelanggan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    public function run()
    {
        pelanggan::factory()->count(100)->create();
    }
}
