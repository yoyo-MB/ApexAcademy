<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instructor;

class InstructorSeeder extends Seeder
{
    public function run(): void
    {
        $avatars = [
            'https://cdn-icons-png.flaticon.com/512/4140/4140048.png',
            'https://cdn-icons-png.flaticon.com/512/4140/4140051.png',
            'https://cdn-icons-png.flaticon.com/512/4140/4140037.png',
            'https://cdn-icons-png.flaticon.com/512/4140/4140061.png',
        ];

        $instructors = [
            ['Zahra Elgaoud', 'Endodontics'],
            ['Saja Awad', 'IT Systems'],
            ['Ahmed Ali', 'Dental Surgery'],
            ['Mariam Ben Saleh', 'Orthodontics'],
            ['Omar Alsharif', 'Periodontics'],
            ['Noor Almasri', 'Pediatric Dentistry'],
            ['Yousef Alhassi', 'Implantology'],
            ['Huda Almarimi', 'Cosmetic Dentistry'],
            ['Salem Kamil', 'General Dentistry'],
            ['Rana Elbashir', 'Dental Hygiene'],
            ['Fares Elhouni', 'TMJ & Occlusion'],
            ['Tasneem Alkhateeb', 'Operative Dentistry'],
            ['Mahmoud Alzawi', 'Radiology'],
            ['Lina Faraj', 'Prosthodontics'],
            ['Khaled Aljaziri', 'Infection Control'],
        ];

        foreach ($instructors as $i => [$name, $speciality]) {
            Instructor::updateOrCreate(
                ['name' => $name],
                [
                    'bio' => "Professional instructor specialized in {$speciality}.",
                    'yearsOfExperience' => rand(3, 15),
                    'speciality' => $speciality,
                    'pictureUrl' => $avatars[$i % count($avatars)],
                ]
            );
        }
    }
}
