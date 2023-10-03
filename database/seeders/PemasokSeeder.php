<?php

namespace Database\Seeders;

use App\Models\Pemasok;
use Database\Factories\PemasokFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemasokSeeder extends Seeder
{
    public function run()
    {
        Pemasok::factory()->count(100)->create();
    }
}
