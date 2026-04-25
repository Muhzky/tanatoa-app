<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Choice extends Model
{
    use HasFactory;

    protected $table = 'choices';

    protected $fillable = [
        'scene_id',
        'text',
        'description',
        'next_scene_id',
        'order',
        'is_active',
    ];

    /**
     * 🎬 Scene asal
     */
    public function scene()
    {
        return $this->belongsTo(Scene::class);
    }

    /**
     * 🎯 Scene tujuan
     */
    public function nextScene()
    {
        return $this->belongsTo(Scene::class, 'next_scene_id');
    }

    /**
     * 🧠 Cek apakah ending
     */
    public function isEnding()
    {
        return $this->next_scene_id === null;
    }
}
