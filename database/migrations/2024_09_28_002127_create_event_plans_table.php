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
        Schema::create('event_plans', function (Blueprint $table) {
            $table->string('PlanNo', 8)->primary();
            $table->string('Notes', 50)->nullable();
            $table->date('WorkDate');
            $table->string('Activity', 50);
            $table->string('EventNo', 8);
            $table->string('EmpNo', 8)->nullable();
            $table->foreign('EventNo')->references('EventNo')->on('event_requests')->onUpdate('cascade');
            $table->foreign('EmpNo')->references('EmpNo')->on('employees')->onUpdate('cascade');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_plans');
    }
};
