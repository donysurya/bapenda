<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cms;
use Illuminate\Support\Facades\Hash;

class CmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cms::create([
            'name' => 'Administrator',
            'email' => 'administrator@katingankab.go.id',
            'password' => Hash::make('QWEasdZXC_1209'),
            'phone' => '05364043574',
            'address' => 'Jl. Garuda Komplek Kantor Bupati, Kasongan, Kab. Katingan, Kalimantan Tengah, Indonesia',
        ]);
    }
}
