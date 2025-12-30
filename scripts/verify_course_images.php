<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Course;

$courses = Course::orderBy('id')->take(3)->get();
foreach ($courses as $c) {
    echo "ID: {$c->id} | Title: {$c->title} | Picture: {$c->pictureUrl}\n";
}
