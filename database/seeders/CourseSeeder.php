<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Instructor;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $instructors = Instructor::orderBy('id')->take(15)->get();
        if ($instructors->count() < 15) {
            return;
        }

        $courses = [
            ['Root Canal Masterclass', 'Advanced root canal workflow, rotary instrumentation, obturation techniques, and common clinical cases.'],
            ['Orthodontics Essentials', 'Introduction to orthodontic diagnosis, basic biomechanics, and treatment planning for common malocclusions.'],
            ['Periodontal Therapy', 'Scaling and root planing principles, periodontal charting, and supportive periodontal therapy protocols.'],
            ['Prosthodontics Basics', 'Crowns, bridges, impressions, occlusion fundamentals, and prosthetic case selection.'],
            ['Oral Surgery Fundamentals', 'Minor oral surgery principles, sterile technique, local anesthesia, and post-operative care.'],
            ['Pediatric Dentistry', 'Behavior management, preventive strategies, and restorative approaches for pediatric patients.'],
            ['Composite Restorations', 'Layering, isolation, finishing/polishing, and class I–V composite techniques.'],
            ['Cosmetic Dentistry', 'Smile analysis, whitening, veneers overview, and esthetic treatment planning.'],
            ['Dental Radiology', 'X-ray positioning, interpretation basics, radiation safety, and common pathology recognition.'],
            ['Dental Hygiene & Prevention', 'Preventive dentistry, patient education, plaque control, and risk-based recall planning.'],
            ['Implant Dentistry Intro', 'Implant fundamentals, case selection, surgical/restorative overview, and maintenance.'],
            ['General Dentistry Clinic Prep', 'Clinical workflow, documentation, infection control, and patient management fundamentals.'],
            ['TMJ & Occlusion', 'Occlusal concepts, TMJ screening, common disorders, and conservative management.'],
            ['Operative Dentistry', 'Caries removal strategies, cavity preparation, liners/bases, and restorative decision-making.'],
            ['Infection Control & Sterilization', 'Sterilization cycles, instrument processing, PPE protocol, and clinic compliance procedures.'],
        ];

        foreach ($courses as $idx => [$title, $desc]) {
            $instructorId = $instructors[$idx]->id;

            Course::updateOrCreate(
                ['title' => $title],
                [
                    'description' => $desc,
                    'duration' => rand(10, 40),          
                    'price' => rand(120, 500),          
                    'instructorId' => $instructorId,
                    'pictureUrl' => '/assets/images/apexdental_academy.png',
                ]
            );
        }
    }
}
