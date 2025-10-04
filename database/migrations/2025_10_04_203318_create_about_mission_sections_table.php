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
        Schema::create('about_mission_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->comment('Bölmənin başlığı');
            $table->text('subtitle')->nullable()->comment('Bölmənin alt başlığı');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_mission_sections');
    }
};
