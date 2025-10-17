<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToPropertiesTable extends Migration
{
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            if (!Schema::hasColumn('properties', 'slug')) {
                $table->string('slug')->nullable()->unique();
            }
            if (!Schema::hasColumn('properties', 'bathrooms')) {
                $table->integer('bathrooms')->nullable();
            }
            if (!Schema::hasColumn('properties', 'area')) {
                $table->string('area')->nullable();
            }
            if (!Schema::hasColumn('properties', 'view')) {
                $table->string('view')->nullable();
            }
            if (!Schema::hasColumn('properties', 'status')) {
                $table->string('status')->default('available');
            }
            if (!Schema::hasColumn('properties', 'ref_number')) {
                $table->string('ref_number')->nullable();
            }
            if (!Schema::hasColumn('properties', 'location')) {
                $table->string('location')->nullable();
            }
            if (!Schema::hasColumn('properties', 'facilities')) {
                $table->text('facilities')->nullable(); // comma-separated or JSON
            }
            if (!Schema::hasColumn('properties', 'latitude')) {
                $table->decimal('latitude', 10, 7)->nullable();
            }
            if (!Schema::hasColumn('properties', 'longitude')) {
                $table->decimal('longitude', 10, 7)->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $columnsToRemove = [];
            $columns = ['slug', 'bathrooms', 'area', 'view', 'status', 'ref_number', 'location', 'facilities', 'latitude', 'longitude'];
            
            foreach ($columns as $column) {
                if (Schema::hasColumn('properties', $column)) {
                    $columnsToRemove[] = $column;
                }
            }
            
            if (!empty($columnsToRemove)) {
                $table->dropColumn($columnsToRemove);
            }
        });
    }
}
