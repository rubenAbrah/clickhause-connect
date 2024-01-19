<?php

namespace Database\Seeders;

use App\Models\Clickhouse\LodataTest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LodataTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      LodataTest::factory(100)->create(); 
    }
}
