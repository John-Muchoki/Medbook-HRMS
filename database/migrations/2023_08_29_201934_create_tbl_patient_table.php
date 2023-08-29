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
        Schema::create('tbl_patient', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('date_of_birth');
            $table->unsignedInteger('gender_id')->nullable();
            $table->foreign('gender_id')->references('id')->on('tbl_gender')->onDelete('cascade');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_patient');
    }
};
