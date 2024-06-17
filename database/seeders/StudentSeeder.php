<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'id_number' => '001',
            'name' => 'Jhun Norman Alonzo',
            'contact_number' => '09957548690',
            'email' => 'alonzojhunnorman@gmail.com',
            'address' => 'cullit lallo cagayan valley',
        ]);
    }
}
