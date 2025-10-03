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
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Ana başlıq');
            $table->text('subtitle')->nullable()->comment('Alt başlıq');
            $table->string('primary_button_text')->default('Lizinqə Müraciət Et')->comment('Əsas düymə mətni');
            $table->string('primary_button_link')->default('#')->comment('Əsas düymə linki');
            $table->string('secondary_button_text')->default('Əlaqə Saxla')->comment('İkinci düymə mətni');
            $table->string('secondary_button_link')->default('#contact')->comment('İkinci düymə linki');
            
            // İstatistik məlumatları
            $table->integer('happy_customers')->default(3500)->comment('Məmnun müştəri sayı');
            $table->integer('delivered_equipment')->default(6800)->comment('Təhvil verilən texnika sayı');
            $table->integer('international_partners')->default(25)->comment('Beynəlxalq tərəfdaş sayı');
            $table->integer('years_experience')->default(15)->comment('İl təcrübə');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
