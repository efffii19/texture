<?php
$projectRoot = dirname(__DIR__);
require $projectRoot . '/vendor/autoload.php';
$app = require $projectRoot . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$exists = Illuminate\Support\Facades\DB::table('migrations')->where('migration', '2023_12_14_000000_create_properties_table')->exists();
if (!$exists) {
    Illuminate\Support\Facades\DB::table('migrations')->insert(['migration' => '2023_12_14_000000_create_properties_table', 'batch' => 2]);
    echo "MARKED\n";
} else {
    echo "ALREADY_MARKED\n";
}
