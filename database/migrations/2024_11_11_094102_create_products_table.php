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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->foreignId('provider_id')->references('id')->on('providers')->cascadeOnDelete();
            $table->string('service_id')->unique();
            $table->string('category_id');
            $table->string('sub_category_id');
            $table->string('image');
            $table->longText('description')->nullable();
            $table->double('profit_percentage', 8, 2);
            $table->boolean('status')->default(1);
            $table->tinyInteger('speed_active')->default(0);
            $table->string('speed_active_text')->nullable();
            $table->tinyInteger('quality_status')->default(0);
            $table->double('quality_percentage')->nullable();
            $table->tinyInteger('security')->default(0);
            $table->string('security_text')->nullable();
            $table->tinyInteger('start_time')->default(0);
            $table->string('start_time_text')->nullable();
            $table->tinyInteger('best_services')->default(0);
            $table->tinyInteger('newest_service')->default(0);
            $table->integer('star_reviews')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
