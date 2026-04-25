<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Story extends Model
{
    use HasFactory;

    protected $table = 'stories';

    protected $fillable = [
        'title',
        'slug',           // ✅ WAJIB ditambah
        'description',
        'cover_image',
        'is_published',   // ✅ WAJIB ditambah
    ];

    protected $casts = [
        'is_published' => 'boolean', // ✅ biar otomatis true/false
    ];

    /**
     * 📚 Relasi ke scenes
     */
    public function scenes()
    {
        return $this->hasMany(Scene::class);
    }

    /**
     * 🔥 Ambil scene pertama (entry point)
     */
    public function firstScene()
    {
        return $this->hasOne(Scene::class)
            ->where('is_start', true); // ✅ lebih tepat dari orderBy
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
