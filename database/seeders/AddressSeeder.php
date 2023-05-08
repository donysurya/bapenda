<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\address;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        address::create([
            'alamat' => 'Jl. Garuda Komplek Kantor Bupati, Kasongan, Kab. Katingan, Kalimantan Tengah, Indonesia',
            'no_telp' => '05364043574',
            'email' => 'administrator@katingankab.go.id',
        ]);
    }
}
