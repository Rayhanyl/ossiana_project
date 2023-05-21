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
        Schema::create('schedullers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders');
            $table->foreignId('inspection_id')->constrained('inspections');
            $table->integer('total_tire');
            $table->integer('initial_inspection');
            $table->integer('washing');
            $table->integer('hotroom');
            $table->integer('flexible_buffing');
            $table->integer('tire_washing');
            $table->integer('cementing');
            $table->integer('building_perfection');
            $table->integer('grooving');
            $table->integer('curing');
            $table->integer('finishing');
            $table->integer('final_inspection');
            $table->integer('total_hour');
            $table->date('estimasi_due_date');
            $table->date('start_reparation_date');
            $table->date('end_reparation_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedullers');
    }
};
