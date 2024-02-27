<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=0; $i <= 2; $i++) {
            DB::table('companies')->insert([
                'name' => 'Netcommerce',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
