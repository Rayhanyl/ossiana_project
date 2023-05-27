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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code');
            $table->string('queue_number')->unique()->nullable();
            $table->date('book_date');
            $table->integer('total_tire');
            $table->string('size_tire');
            $table->date('delivery_tire');
            $table->string('detail_order');
            $table->string('pict_down_payment')->nullable();
            $table->string('price_down_payment')->nullable();
            $table->string('status_dp')->nullable();
            $table->string('pict_full_payment')->nullable();
            $table->string('price_full_payment')->nullable();
            $table->string('status_fp')->nullable();
            $table->string('payment_status');
            $table->string('tire_status');
            $table->string('status');
            $table->foreignId('user_id')->constrained('users');
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
