<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ConferenceHall;

class ConferenceHallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ConferenceHall::insert([
            ['name' => 'Lecture Hall'],
            ['name' => 'Manthan'],
            ['name' => 'Samvad'],
        ]);
    }
}
