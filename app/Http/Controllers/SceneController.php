<?php

namespace App\Http\Controllers;

use App\Models\Scene;
use App\Models\Choice;
use App\Models\Story; 
use Illuminate\Http\Request;

class SceneController extends Controller
{
    
    public function show(Scene $scene)
    {
        // Cek is_published jika kolom ada, atau skip jika tidak
        if (isset($scene->is_published) && !$scene->is_published) {
            abort(404, 'Scene tidak ditemukan atau belum dipublish');
        }

        // Ambil semua pilihan untuk scene ini
        $choices = $scene->choices()
            ->where('is_active', true) 
            ->orderBy('order')
            ->get();

        // Cek apakah ini scene akhir
        $isEndScene = (bool) ($scene->is_ending ?? $scene->is_end ?? false);
        
        // Fallback logic jika tidak ada flag ending
        if (!$isEndScene) {
            $isEndScene = empty($scene->next_scene_id) && $choices->isEmpty();
        }

        return view('stories.scene', compact('scene', 'choices', 'isEndScene'));
    }

   
    public function selectChoice(Choice $choice, Request $request)
    {
        // Validasi choice aktif
        if (isset($choice->is_active) && !$choice->is_active) {
            abort(400, 'Pilihan ini tidak tersedia');
        }

        // Simpan progress di session
        session([
            'story_id'   => $choice->scene->story_id,
            'story_slug' => $choice->scene->story->slug ?? null,
            'scene_id'   => $choice->next_scene_id
        ]);

        // Jika tidak ada next_scene_id, tampilkan ending
        if (!$choice->next_scene_id) {
            return view('stories.ending', [
                'story' => $choice->scene->story,
                'scene' => $choice->scene
            ]);
        }

        // Redirect ke scene berikutnya
        $nextScene = Scene::findOrFail($choice->next_scene_id);
        $storySlug = $nextScene->story->slug;

        return redirect()->route('stories.scene', [
            'story' => $storySlug,
            'scene' => $nextScene->id
        ]);
    }

    public function nextScene($storySlug, Scene $scene, Request $request)
    {
        // 1. Cek next_scene_id langsung di scene
        if (!empty($scene->next_scene_id)) {
            $nextScene = Scene::where('id', $scene->next_scene_id)
                ->first(); // Hapus is_active jika kolom tidak ada
            
            if ($nextScene) {
                session([
                    'story_id' => $scene->story_id,
                    'story_slug' => $storySlug,
                    'scene_id' => $nextScene->id
                ]);
                
                return redirect()->route('stories.scene', [
                    'story' => $storySlug,
                    'scene' => $nextScene->id
                ]);
            }
        }

        // 2. Fallback: cari berdasarkan order
        $nextScene = Scene::where('story_id', $scene->story_id)
            ->where('order', '>', $scene->order)
            ->orderBy('order', 'asc')
            ->first();

        if ($nextScene) {
            session([
                'story_id' => $scene->story_id,
                'story_slug' => $storySlug,
                'scene_id' => $nextScene->id
            ]);
            
            return redirect()->route('stories.scene', [
                'story' => $storySlug,
                'scene' => $nextScene->id
            ]);
        }

        // 3. Tidak ada scene berikutnya = ending
        return redirect()->route('home')->with('info', '🎉 Cerita telah selesai!');
    }

    
    public function restart($storySlug, Request $request)
    {
        // Reset session progress
        session()->forget(['story_id', 'story_slug', 'scene_id']);

        // Ambil story dengan is_published
        $story = Story::where('slug', $storySlug)
            ->where('is_published', true) 
            ->firstOrFail();

        $firstScene = $story->scenes()
            ->where('is_start', true)
            ->first() 
            ?? $story->scenes()->orderBy('order', 'asc')->first();

        if ($firstScene) {
            return redirect()->route('stories.scene', [
                'story' => $storySlug,
                'scene' => $firstScene->id
            ]);
        }

        return redirect()->route('home')->with('error', 'Cerita tidak memiliki scene yang valid.');
    }
}