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
        Schema::table('schools', function (Blueprint $table) {
            $table->foreignId('city_id')->constrained('cities')->cascadeOnDelete();
            $table->foreignId('stage_id')->constrained('stages')->cascadeOnDelete();
        });
        Schema::table('students', function (Blueprint $table) {
            $table->foreignId('city_id')->constrained('cities')->cascadeOnDelete();
            $table->foreignId('year_id')->constrained('years')->cascadeOnDelete();
            $table->foreignId('school_id')->constrained('schools')->cascadeOnDelete();
        });
        Schema::table('cities', function (Blueprint $table) {
            $table->foreignId('wilaya_id')->constrained('wilayas')->cascadeOnDelete();
        });

        Schema::table('years', function (Blueprint $table) {
            $table->foreignId('stage_id')->constrained('stages')->cascadeOnDelete();
        });

        Schema::table('features', function (Blueprint $table) {
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('key_id')->constrained('keys')->cascadeOnDelete();
        });

        Schema::table('keys', function (Blueprint $table) {
            $table->morphs('profileable');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schools', function (Blueprint $table) {
            //
        });
    }
};
