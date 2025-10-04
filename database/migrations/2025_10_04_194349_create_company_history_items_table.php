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
        Schema::create('company_history_items', function (Blueprint $table) {
            $table->id();
            $table->string('year')->comment('Tarix (məs: 2023)');
            $table->string('title')->comment('Elementin başlığı (məs: Şirkətin Yaradılması)');
            $table->text('description')->comment('Qısa təsvir');
            $table->string('icon_class')->nullable()->comment('FontAwesome ikon classı');
            $table->integer('order')->default(0)->comment('Göstərilmə sırası');
            $table->boolean('is_active')->default(true)->comment('Aktiv/Deaktiv statusu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_history_items');
    }
};
