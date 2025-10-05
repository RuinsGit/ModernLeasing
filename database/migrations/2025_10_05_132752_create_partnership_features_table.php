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
        Schema::create('partnership_features', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Xüsusiyyət başlığı');
            $table->text('description')->comment('Xüsusiyyət təsviri');
            $table->string('icon_class')->nullable()->comment('Xüsusiyyət ikonu (FontAwesome)');
            $table->string('image')->nullable()->comment('Sağ tərəfdə göstəriləcək şəkil');
            $table->string('stat_number_1')->nullable()->comment('Birinci statistik rəqəm (məs: 3500+)');
            $table->string('stat_text_1')->nullable()->comment('Birinci statistik mətn (məs: Məmnun Müştəri)');
            $table->string('stat_number_2')->nullable()->comment('İkinci statistik rəqəm (məs: 25)');
            $table->string('stat_text_2')->nullable()->comment('İkinci statistik mətn (məs: Beynəlxalq Tərəfdaş)');
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
        Schema::dropIfExists('partnership_features');
    }
};
