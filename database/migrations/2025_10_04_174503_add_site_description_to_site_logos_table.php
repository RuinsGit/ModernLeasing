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
            $table->text('site_description')->nullable()->after('site_name')->comment('Saytın aşağı hissəsində göstərilən təsvir');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_logos', function (Blueprint $table) {
            $table->dropColumn('site_description');
        });
    }
};
