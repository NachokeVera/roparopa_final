<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TallaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tallas')->insert(['talla' => 'XS']);
        DB::table('tallas')->insert(['talla' => 'S']);
        DB::table('tallas')->insert(['talla' => 'M']);
        DB::table('tallas')->insert(['talla' => 'L']);
        DB::table('tallas')->insert(['talla' => 'XL']);
    }
}
