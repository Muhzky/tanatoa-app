<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('choices', function (Blueprint $table) {
            $table->id();

            // 🔗 dari scene mana
            $table->foreignId('scene_id')
                ->constrained()
                ->cascadeOnDelete();

            // ✍️ teks pilihan utama
            $table->string('text');

            // 📝 deskripsi tambahan (optional)
            $table->text('description')->nullable(); // ✅ TAMBAHAN

            // 🔗 ke scene mana
            $table->foreignId('next_scene_id')
                ->nullable()
                ->constrained('scenes')
                ->nullOnDelete();

            // 🔢 urutan tombol
            $table->integer('order')->default(0);

            // 🔘 aktif / tidak
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            // ⚡ OPTIMASI
            $table->index(['scene_id', 'is_active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('choices');
    }
};
