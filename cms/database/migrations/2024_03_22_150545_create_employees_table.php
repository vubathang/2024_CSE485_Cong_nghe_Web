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
        Schema::create('employees', function (Blueprint $table) {
            $table->id('employeeId');
            $table->string('fullName', 50);
            $table->string('address', 100);
            $table->string('email', 50);
            $table->string('phone', 15);
            $table->string('position', 50);
            $table->string('avatar', 100)->nullable();
            $table->unsignedBigInteger('departmentId')->nullable();
            $table->primary('employeeId');
            // $table->foreign('departmentId')->references('departmentId')->on('departments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
