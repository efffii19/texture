<?php
$projectRoot = dirname(__DIR__);
require $projectRoot . '/vendor/autoload.php';
$app = require $projectRoot . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$p = App\Models\Property::first();
if (!$p) {
    echo "NO_PROPERTY\n";
    exit(0);
}
echo json_encode($p->toArray(), JSON_PRETTY_PRINT) . "\n";
