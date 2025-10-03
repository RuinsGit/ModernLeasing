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
        Schema::create('site_logos', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->comment('Sayt adı');
            $table->string('logo_image')->nullable()->comment('Logo şəkli');
            $table->string('favicon')->nullable()->comment('Favicon şəkli');
            $table->boolean('show_text')->default(true)->comment('Logo yazısını göstər');
            $table->boolean('is_active')->default(true)->comment('Aktiv logo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_logos');
    }
};