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
        Schema::create('contact_infos', function (Blueprint $table) {
            $table->id();
            $table->string('address')->nullable()->comment('Ünvan');
            $table->string('phone1')->nullable()->comment('Telefon 1');
            $table->string('phone2')->nullable()->comment('Telefon 2');
            $table->string('email1')->nullable()->comment('E-poçt 1');
            $table->string('email2')->nullable()->comment('E-poçt 2');
            $table->text('working_hours_weekdays')->nullable()->comment('İş saatları (həftəiçi)');
            $table->text('working_hours_weekends')->nullable()->comment('İş saatları (həftəsonu)');
            $table->boolean('is_active')->default(true)->comment('Aktiv/Deaktiv');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_infos');
    }
};
