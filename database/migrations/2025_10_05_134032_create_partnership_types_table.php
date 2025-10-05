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
        Schema::create('partnership_types', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Tərəfdaşlıq növünün başlığı');
            $table->text('description')->nullable()->comment('Tərəfdaşlıq növünün qısa təsviri');
            $table->string('icon_class')->nullable()->comment('Tərəfdaşlıq növünün ikonu (FontAwesome)');
            $table->json('benefits')->nullable()->comment('Faydalar siyahısı (JSON formatında)');
            $table->integer('order')->default(0)->comment('Göstərilmə sırası');
            $table->boolean('is_active')->default(true)->comment('Aktivlik statusu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partnership_types');
    }
};
