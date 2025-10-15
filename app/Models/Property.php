<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'description_long',
        'price',
        'transaction_type',
        'property_type',
        'bedrooms',
        'bathrooms',
        'area',
        'location',
        'reference_no',
        'view',
        'status',
        'key_features',
        'amenities',
        'images',
        'is_published',
        'map_iframe',
        'company_name',
        'company_address',
        'company_phone',
        'company_email',
        'company_website',
    ];

    protected $casts = [
        'images' => 'array',
        'amenities' => 'array',
        'is_published' => 'boolean',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
