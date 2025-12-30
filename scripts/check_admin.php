<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

// Boot the kernel to get access to Eloquent and facades
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

$admin = Admin::where('email', 'admin@apexacademy.com')->first();
if (! $admin) {
    echo "Admin not found\n";
    exit(1);
}

echo "Admin found: \n";
echo "ID: {$admin->id}\n";
echo "Email: {$admin->email}\n";

// Raw attributes
$raw = $admin->getAttributes();
echo "Raw stored password (from attributes): \n";
echo ($raw['password'] ?? 'null') . "\n";

// Accessed attribute via model (may be casted)
echo "Accessed password via \$admin->password: \n";
$val = $admin->password;
if (is_object($val)) {
    echo "(object of class: " . get_class($val) . ")\n";
    if (method_exists($val, '__toString')) {
        echo (string) $val . "\n";
    } else {
        echo "(no __toString)\n";
    }
} else {
    echo (string) $val . "\n";
}

// Test Hash::check against raw attribute
$testPassword = 'Admin@123';
$rawHash = $raw['password'] ?? null;
if ($rawHash) {
    $ok = Hash::check($testPassword, $rawHash) ? 'YES' : 'NO';
    echo "Hash::check against raw hash: $ok\n";
}

// If accessed value is object, try to extract underlying hash if possible
if (is_object($val)) {
    // Try common property names
    $props = [];
    foreach (['hash', 'value', 'payload', 'attributes'] as $p) {
        if (property_exists($val, $p)) {
            $props[$p] = $val->$p;
        }
    }
    if ($props) {
        echo "Found object properties (attempting Hash::check):\n";
        foreach ($props as $k => $v) {
            echo "$k => ";
            $ok = Hash::check($testPassword, $v) ? 'YES' : 'NO';
            echo "$ok\n";
        }
    }
}

echo "Done\n";
