<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // owner
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->enum('transaction_type', ['rent', 'sale'])->default('rent');
            $table->string('property_type')->nullable();
            $table->integer('bedrooms')->nullable();
            $table->json('images')->nullable(); // store filenames as JSON array
            $table->boolean('is_published')->default(false); // admin approves
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
