<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OfficeHour;

class OfficehourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $office_hours = [
            [
                'day' => 'Senin - Kamis',
                'start_time' => '07:30:00',
                'end_time' => '16:00:00',
            ],
            [
                'day' => 'Jumat',
                'start_time' => '07:30:00',
                'end_time' => '11:30:00',
            ],
        ];

        foreach($office_hours as $item)
            OfficeHour::create([
                'day' => $item['day'],
                'start_time' => $item['start_time'],
                'end_time' => $item['end_time'],
            ]);
    }
}
