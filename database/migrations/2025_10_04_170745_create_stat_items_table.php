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
        Schema::create('stat_items', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Statistika elementinin başlığı');
            $table->string('icon')->comment('FontAwesome icon class');
            $table->integer('value')->comment('Statistika sayı/dəyəri');
            $table->integer('order')->default(0)->comment('Göstərilmə sırası');
            $table->boolean('is_active')->default(true)->comment('Aktiv/Deaktiv');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stat_items');
    }
};
