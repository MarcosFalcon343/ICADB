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
        Schema::create('customers', function (Blueprint $table) {
            $table->string('CustNo', 8)->primary()->unique();
            $table->string('CustName', 50);
            $table->string('Address', 50);
            $table->char('Internal', 1);
            $table->string('Contact', 50);
            $table->string('Phone', 11);
            $table->string('City', 30);
            $table->string('State', 2);
            $table->string('ZipCode', 10);
            $table->unsignedBigInteger('user_id'); // Clave foránea
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
