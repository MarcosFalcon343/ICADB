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
        Schema::create('event_plan_lines', function (Blueprint $table) {
            $table->string('PlanNo', 8)->nullable();
            $table->integer('IdLineNo')->nullable();
            $table->dateTime('TimeStart');
            $table->dateTime('TimeEnd');
            $table->integer('ResCnt');
            $table->string('LocNo', 8);
            $table->string('ResNo', 8);
            $table->foreign('PlanNo')->references('PlanNo')->on('event_plans')->onUpdate('cascade');
            $table->foreign('LocNo')->references('LocNo')->on('locations')->onUpdate('no action');
            $table->foreign('ResNo')->references('ResNo')->on('resource_tbls')->onUpdate('cascade');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_plan_lines');
    }
};
