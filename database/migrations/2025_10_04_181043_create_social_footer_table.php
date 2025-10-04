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
        Schema::create('social_footer', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable()->comment('Sosial media loqosu (şəkil)');
            $table->string('icon_class')->nullable()->comment('Sosial media ikonu (FontAwesome class)');
            $table->string('link')->comment('Sosial media linki');
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
        Schema::dropIfExists('social_footer');
    }
};
