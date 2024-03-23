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
        Schema::create('departments', function (Blueprint $table) {
            $table->id('departmentId');
            $table->string('departmentName', 50);
            $table->string('address', 100);
            $table->string('email', 50);
            $table->string('phone', 15);
            $table->unsignedBigInteger('parentDepartmentId')->nullable();
            $table->foreign('parentDepartmentId')->references('departmentId')->on('departments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
