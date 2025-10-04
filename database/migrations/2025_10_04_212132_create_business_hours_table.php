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
        Schema::create('business_hours', function (Blueprint $table) {
            $table->id();
            $table->string('weekday_hours')->nullable()->comment('Həftə içi iş saatları (məs: Bazar ertəsi - Cümə: 09:00 - 18:00)');
            $table->string('weekend_hours')->nullable()->comment('Həftə sonu iş saatları (məs: Şənbə: 09:00 - 14:00, Bazar: Bağlı)');
            $table->boolean('is_active')->default(true)->comment('İş saatları aktivdirmi?');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_hours');
    }
};
