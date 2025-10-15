<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$r = new ReflectionClass($kernel);
echo get_class($kernel) . "\n";
echo $r->getFileName() . "\n";
foreach (['middlewareAliases','routeMiddleware','middlewareGroups'] as $p) {
    if ($r->hasProperty($p)) {
        $prop = $r->getProperty($p);
        $prop->setAccessible(true);
        echo "---- $p ----\n";
        print_r($prop->getValue($kernel));
    } else {
        echo "no property $p\n";
    }
}
