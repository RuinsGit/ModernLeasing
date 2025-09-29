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
        // Add status column to logos table if it doesn't exist
        if (!Schema::hasColumn('logos', 'status')) {
            Schema::table('logos', function (Blueprint $table) {
                $table->boolean('status')->default(1)->after('logo_title2_ru');
            });
        }
        
        // Add status column to social_footer table if it doesn't exist
        if (!Schema::hasColumn('social_footer', 'status')) {
            Schema::table('social_footer', function (Blueprint $table) {
                $table->boolean('status')->default(1)->after('order');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('logos', 'status')) {
            Schema::table('logos', function (Blueprint $table) {
                $table->dropColumn('status');
            });
        }
        
        if (Schema::hasColumn('social_footer', 'status')) {
            Schema::table('social_footer', function (Blueprint $table) {
                $table->dropColumn('status');
            });
        }
    }
};


