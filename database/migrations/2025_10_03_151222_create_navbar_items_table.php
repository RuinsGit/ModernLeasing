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
        Schema::create('navbar_items', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Menyu başlığı');
            $table->string('route_name')->comment('Laravel route adı');
            $table->string('url')->nullable()->comment('Xarici URL (route_name yoxdursa)');
            $table->string('icon')->nullable()->comment('FontAwesome icon class (mobil üçün)');
            $table->integer('order')->default(0)->comment('Göstərilmə sırası');
            $table->boolean('is_active')->default(true)->comment('Aktiv/Deaktiv');
            $table->boolean('show_desktop')->default(true)->comment('Desktop navbarda göstər');
            $table->boolean('show_mobile')->default(true)->comment('Mobil navbarda göstər');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('navbar_items');
    }
};