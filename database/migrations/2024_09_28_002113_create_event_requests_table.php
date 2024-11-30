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
        Schema::create('event_requests', function (Blueprint $table) {
            $table->string('EventNo', 8)->primary();
            $table->date('DateHeld');
            $table->date('DateReq');
            $table->date('DateAuth');
            $table->string('Status', 8);
            $table->decimal('EstCost', 12, 2);
            $table->unsignedBigInteger('EstAudience');
            $table->string('BudNo', 8)->nullable();
            $table->string('CustNo', 8);
            $table->string('FacNo', 8);
            $table->foreign('CustNo')->references('CustNo')->on('customers')->onUpdate('cascade');
            $table->foreign('FacNo')->references('FacNo')->on('facilities')->onUpdate('cascade');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_requests');
    }
};
