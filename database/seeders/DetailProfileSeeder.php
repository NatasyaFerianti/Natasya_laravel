<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('detail_profile')->insert([
            'address' => 'Nganjuk',
            'nomor_tlp' => '0812345678',
            'ttl' => '2001-03-13',
            'foto' => 'picture.png'
        ]);
    }
}