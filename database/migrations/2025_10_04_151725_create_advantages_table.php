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
        Schema::create('advantages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Üstünlük başlığı');
            $table->text('description')->comment('Üstünlük təsviri');
            $table->string('icon')->comment('FontAwesome icon class');
            $table->string('image')->nullable()->comment('Üstünlük şəkli (opsional)');
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
        Schema::dropIfExists('advantages');
    }
};
