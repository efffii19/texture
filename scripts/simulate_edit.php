<?php
$projectRoot = dirname(__DIR__);
require $projectRoot . '/vendor/autoload.php';
$app = require $projectRoot . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Property;

$property = Property::first();
if (!$property) {
    echo "NO_PROPERTY\n";
    exit(0);
}

$component = [];
$component['editingId'] = $property->id;
$component['title'] = $property->title;
$component['description'] = $property->description;
$component['price'] = $property->price;
// transaction_type
$component['transaction_type'] = $property->transaction_type ?? null;
if (empty($component['transaction_type']) && !empty($property->type)) {
    $lower = strtolower((string) $property->type);
    if (in_array($lower, ['rent', 'sale'])) {
        $component['transaction_type'] = $lower;
    }
}
// property_type
$component['property_type'] = $property->property_type ?? $property->type ?? null;
$component['bedrooms'] = $property->bedrooms;
// images
if (!empty($property->images) && is_array($property->images)) {
    $component['existingImages'] = $property->images;
} elseif (!empty($property->image)) {
    $component['existingImages'] = [$property->image];
} else {
    $component['existingImages'] = [];
}
$component['bathrooms'] = $property->bathrooms;
$component['area'] = $property->area;
$component['location'] = $property->location;
$component['reference_no'] = $property->reference_no;
$component['view'] = $property->view;
$component['status'] = null;
if (!empty($property->status)) {
    $component['status'] = strtolower((string) $property->status);
}
$component['description_long'] = $property->description_long;
$component['key_features'] = $property->key_features;
// amenities normalization
if (is_array($property->amenities)) {
    $component['amenities'] = implode(', ', $property->amenities);
} else {
    $component['amenities'] = $property->amenities ?? '';
}
$component['map_iframe'] = $property->map_iframe;
$component['company_name'] = $property->company_name;
$component['company_address'] = $property->company_address;
$component['company_phone'] = $property->company_phone;
$component['company_email'] = $property->company_email;
$component['company_website'] = $property->company_website;
$component['is_published'] = (bool) ($property->is_published ?? false);

echo json_encode($component, JSON_PRETTY_PRINT) . "\n";
