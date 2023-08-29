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
        Schema::create('tbl_patient_services', function (Blueprint $table) {
            $table->id();
            $table->string('type_of_service');
            $table->string('comments');

            $table->unsignedInteger('patient_id')->nullable();
            $table->foreign('patient_id')->references('id')->on('tbl_patient')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_patient_services');
    }
};
