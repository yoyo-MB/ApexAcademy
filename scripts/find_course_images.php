<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Course;

$imgs = ['/assets/images/course1.png','/assets/images/course2.png','/assets/images/course3.png'];
$courses = Course::whereIn('pictureUrl',$imgs)->orderBy('id')->get();
if ($courses->isEmpty()) {
    echo "No courses found using course1/course2/course3 images.\n";
    exit(0);
}
foreach ($courses as $c) {
    echo "ID: {$c->id} | Title: {$c->title} | Picture: {$c->pictureUrl}\n";
}
