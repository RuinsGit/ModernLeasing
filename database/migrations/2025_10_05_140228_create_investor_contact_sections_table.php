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
        Schema::create('investor_contact_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Bölmənin başlığı');
            $table->text('subtitle')->nullable()->comment('Bölmənin alt başlığı');
            $table->string('button1_text')->nullable()->comment('Birinci düymənin mətni (məs: Əlaqə Saxlayın)');
            $table->string('button1_link')->nullable()->comment('Birinci düymənin linki (məs: /elaqe)');
            $table->string('button2_text')->nullable()->comment('İkinci düymənin mətni (məs: +994 XX XXX XX XX)');
            $table->string('button2_link')->nullable()->comment('İkinci düymənin linki (məs: tel:+994XXXXXXXXX)');
            $table->string('email')->nullable()->comment('Əlaqə üçün email');
            $table->boolean('is_active')->default(true)->comment('Bölmənin aktivlik statusu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investor_contact_sections');
    }
};
