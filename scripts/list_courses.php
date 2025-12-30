<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Course;

$courses = Course::all();
echo "Courses count: " . $courses->count() . "\n";
foreach ($courses as $c) {
    echo "ID: {$c->id} | Title: {$c->title} | Slug: {$c->slug} | InstructorId: {$c->instructorId}\n";
}
