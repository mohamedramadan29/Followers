<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->integer('user_id');
            $table->string('service_type');
            $table->integer('provider_id');
            $table->integer('main_service_id');
            $table->integer('product_id');
            $table->integer('sub_service_id')->nullable();
            $table->string('name');
            $table->double('quantity');
            $table->string('page_link');
            $table->double('provider_main_price');
            $table->double('profit_percentage');
            $table->double('total_price');
            $table->tinyInteger('order_status');
            $table->string('refill')->nullable();
            $table->string('refill_status')->nullable();
            $table->string('cancel')->nullable();
            $table->string('cancel_status')->nullable();
            $table->string('end_time')->nullable();
            $table->string('status');
            $table->timestamp('start_time');
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
