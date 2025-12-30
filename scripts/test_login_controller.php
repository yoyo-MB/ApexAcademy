<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Http\Request;
use App\Http\Controllers\authController;

$request = Request::create('/login', 'POST', [
    'email' => 'admin@apexacademy.com',
    'password' => 'Admin@123',
]);

$controller = new authController();
try {
    $response = $controller->login($request);
    if ($response instanceof \Illuminate\Http\RedirectResponse) {
        echo "Redirect to: " . $response->getTargetUrl() . "\n";
    } else {
        // Try to dump response content
        echo "Response class: " . get_class($response) . "\n";
        if (method_exists($response, 'getContent')) {
            echo $response->getContent() . "\n";
        }
    }
} catch (\Exception $e) {
    echo "Exception: " . $e->getMessage() . "\n";
    echo $e->getTraceAsString();
}
