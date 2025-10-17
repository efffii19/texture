<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Property extends Model
{
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
        'view',
        'status',
        'reference_no',
        'location',
        'facilities',
        'key_features',
        'amenities',
        'map_iframe',
        'company_name',
        'company_address',
        'company_phone',
        'company_email',
        'company_website',
        'latitude',
        'longitude',
        'images',
        'is_published'
    ];

    protected $casts = [
        'images' => 'array',
        'facilities' => 'array',
        'amenities' => 'array',
        'is_published' => 'boolean',
        'price' => 'decimal:2',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
    ];

    public function getImagesAttribute($value)
    {
        if (is_array($value)) {
            return $value;
        }
        if (is_string($value)) {
            $decoded = json_decode($value, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                \Log::error('JSON decode error for images: ' . json_last_error_msg());
                return [];
            }
            return $decoded ?: [];
        }
        return [];
    }

    public function getAmenitiesAttribute($value)
    {
        if (is_array($value)) {
            return $value;
        }
        if (is_string($value)) {
            $decoded = json_decode($value, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                \Log::error('JSON decode error for amenities: ' . json_last_error_msg());
                return [];
            }
            return $decoded ?: [];
        }
        return [];
    }

    public function getFirstImageUrlAttribute()
    {
        $images = $this->images; // Uses the getImagesAttribute accessor
        return !empty($images) ? asset('storage/' . $images[0]) : asset('images/pro1.jpg');
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = $value;
    }

    protected static function generateUniqueSlug($title, $attempt = 0)
    {
        $baseSlug = Str::slug($title);
        $slug = $attempt > 0 ? $baseSlug . '-' . $attempt : $baseSlug;

        while (static::where('slug', $slug)->exists()) {
            $attempt++;
            $slug = $baseSlug . '-' . $attempt;
        }

        return $slug;
    }

    // Auto-generate SEO-friendly slug when creating a property
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($property) {
            if (empty($property->slug) && !empty($property->title)) {
                $property->slug = static::generateUniqueSlug($property->title);
            }
        });
    }

    // Owner relationship
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
