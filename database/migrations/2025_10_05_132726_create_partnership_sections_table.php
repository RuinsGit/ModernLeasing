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
        Schema::create('partnership_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->comment('Tərəfdaşlıq bölməsinin başlığı');
            $table->text('subtitle')->nullable()->comment('Tərəfdaşlıq bölməsinin alt başlığı');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partnership_sections');
    }
};
