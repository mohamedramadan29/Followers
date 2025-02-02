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
        Schema::create('sub_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->string('name');
            $table->integer('provider_service_id');
            $table->tinyInteger('speed_active')->default(0);
            $table->string('speed_active_text')->nullable();
            $table->tinyInteger('quality_status')->default(0);
            $table->double('quality_percentage')->nullable();
            $table->tinyInteger('security')->default(0);
            $table->string('security_text')->nullable();
            $table->tinyInteger('start_time')->default(0);
            $table->string('start_time_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_services');
    }
};
