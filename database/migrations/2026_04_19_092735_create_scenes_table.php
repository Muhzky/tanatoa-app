<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('scenes', function (Blueprint $table) {
            $table->id();

            // 🔗 relasi ke story
            $table->foreignId('story_id')
                ->constrained()
                ->cascadeOnDelete();

            // 📝 konten
            $table->string('title')->nullable();
            $table->longText('content');

            // 🎞️ MEDIA (FINAL)
            $table->string('media_visual')->nullable(); // gambar / video
            $table->string('media_audio')->nullable();  // audio narasi

            // 🎬 status scene
            $table->boolean('is_start')->default(false);
            $table->boolean('is_ending')->default(false);

            // 🔢 urutan (fallback)
            $table->integer('order')->default(0);

            $table->timestamps();

            // ⚡ OPTIMASI
            $table->index(['story_id', 'is_start']);
            $table->index(['story_id', 'order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('scenes');
    }
};
