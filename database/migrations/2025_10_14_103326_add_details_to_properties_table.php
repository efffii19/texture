<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->string('reference_no')->nullable();
            $table->string('location')->nullable();
            $table->string('area')->nullable(); // e.g., "2224 SQFT"
            $table->integer('bathrooms')->nullable();
            $table->string('view')->nullable(); // e.g., "Community"
            $table->string('status')->default('Available');
            $table->text('key_features')->nullable(); // Comma-separated or JSON list
            $table->text('description_long')->nullable(); // Full detailed description
            $table->json('amenities')->nullable(); // JSON array of features
            $table->string('map_iframe')->nullable(); // Google Maps embed link
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_website')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn([
                'reference_no',
                'location',
                'area',
                'bathrooms',
                'view',
                'status',
                'key_features',
                'description_long',
                'amenities',
                'map_iframe',
                'company_name',
                'company_address',
                'company_phone',
                'company_email',
                'company_website'
            ]);
        });
    }
};
