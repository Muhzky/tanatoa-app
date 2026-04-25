<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Scene extends Model
{
    use HasFactory;

    protected $table = 'scenes';

    protected $fillable = [
        'story_id',
        'title',
        'content',
        'media_visual',
        'media_audio',
        'is_start',
        'is_ending',
        'order',
    ];

    protected $casts = [
        'media' => 'array',
        'is_start' => 'boolean',
        'is_ending' => 'boolean',
    ];

    
    // protected $casts = [
    //     'media' => 'array', // kalau pakai multiple media dari filament
    // ];

    /**
     * 📖 Relasi ke story
     */
    public function story()
    {
        return $this->belongsTo(Story::class);
    }

    /**
     * 🔀 Relasi ke choices
     */
    public function choices()
    {
        return $this->hasMany(Choice::class)
            ->where('is_active', true)
            ->orderBy('order');
    }

    /**
     * 🔙 Scene yang menuju ke sini
     */
    public function previousChoices()
    {
        return $this->hasMany(Choice::class, 'next_scene_id');
    }
}
