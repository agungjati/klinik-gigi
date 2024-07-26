<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('appointments')->insert([
            'name' => 'John Doe',
            'email' => 'test@gmail.com',
            'hp' => '08123456789',
            'doctor' => 'doctor 1',
            'date' => '2024-12-12',
            'time' => '10:00',
            'describe' => 'test description'
        ]);
    }
}
