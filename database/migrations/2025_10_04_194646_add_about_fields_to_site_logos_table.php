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
        Schema::table('site_logos', function (Blueprint $table) {
            $table->string('about_title')->nullable()->after('site_description')->comment('Haqqımızda səhifəsinin başlığı');
            $table->text('about_subtitle')->nullable()->after('about_title')->comment('Haqqımızda səhifəsinin alt başlığı');
            $table->string('about_image')->nullable()->after('about_subtitle')->comment('Haqqımızda səhifəsinin şəkli');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_logos', function (Blueprint $table) {
            $table->dropColumn(['about_title', 'about_subtitle', 'about_image']);
        });
    }
};
