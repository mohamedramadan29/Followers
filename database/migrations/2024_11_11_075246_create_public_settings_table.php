<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('public_settings', function (Blueprint $table) {
            $table->id();
            $table->string('website_name')->default(' متجر المتابعين  ');
            $table->string('website_logo')->nullable();
            $table->string('website_short_desc')->nullable();
            $table->string('website_description')->nullable();
            $table->string('website_keywords')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string(column: 'twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string(column: 'youtube')->nullable();
            $table->string('snapchap')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('whatsapp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('public_settings');
    }
};
