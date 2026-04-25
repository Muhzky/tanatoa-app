<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\Scene;
use App\Models\Choice;
use Illuminate\Support\Str;

class StoryController extends Controller
{
    /**
     * 🏠 Homepage
     */
    public function index()
    {
        return view('home');
    }

    /**
     * 📚 List semua cerita (hanya yang published)
     */
    public function stories()
    {
        $stories = Story::where('is_published', true)
            ->latest()
            ->paginate(9);
        return view('stories.index', compact('stories'));
    }

    /**
     * ▶️ Mulai cerita (ambil scene awal)
     */
    public function start($slug)
    {
        $story = Story::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        // Ambil scene pertama (is_start=true) atau fallback ke order terkecil
        $scene = $story->scenes()
            ->where('is_start', true)
            ->first();

        // 🔥 fallback
        if (!$scene) {
            $scene = $story->scenes()
                ->orderBy('order', 'asc')
                ->first();
        }

        // 🔥 kalau tetap kosong
        if (!$scene) {
            abort(404, 'Scene belum tersedia');
        }

        // Simpan progress di session
        session([
            'story_id' => $story->id,
            'story_slug' => $story->slug,
            'scene_id' => $scene->id
        ]);

        return redirect()->route('stories.scene', [
            'story' => $story->slug,
            'scene' => $scene->id
        ]);
    }

    /**
     * 🎬 Tampilkan scene + pilihan
     */
    public function showScene(Story $story, $sceneId)
    {
        // Pastikan scene benar-benar milik story ini
        $scene = $story->scenes()
            ->where('id', $sceneId)
            ->with('choices')
            ->firstOrFail();

        // Update session progress
        session([
            'story_id' => $story->id,
            'story_slug' => $story->slug,
            'scene_id' => $scene->id
        ]);

        // Ambil audio dari media (jika array)
        $audio = null;
        if (is_array($scene->media)) {
            $audio = collect($scene->media)
                ->first(fn($file) => Str::endsWith($file, ['.mp3', '.wav', '.ogg']));
        } elseif (Str::endsWith($scene->media ?? '', ['.mp3', '.wav', '.ogg'])) {
            $audio = $scene->media;
        }

        // ✅ Cek apakah ini scene ending
        $isEnding = (bool) $scene->is_ending;

        // ✅ SELALU return view 'stories.scene' dengan variable $isEnding
        return view('stories.scene', compact('story', 'scene', 'audio', 'isEnding'));
    }

    /**
     * 👉 Handle pilihan user (Legacy/Alternative)
     */
    public function choose(Request $request)
    {
        $choiceId = $request->input('choice_id');
        $choice = Choice::with('scene.story')->findOrFail($choiceId);

        $currentScene = $choice->scene;

        // Simpan progress
        session([
            'story_id' => $currentScene->story_id,
            'story_slug' => $currentScene->story->slug,
            'scene_id' => $choice->next_scene_id ?? $currentScene->id
        ]);

        // Jika tidak ada next_scene_id → tampilkan scene saat ini sebagai ending
        if (!$choice->next_scene_id) {
            $audio = null;
            if (is_array($currentScene->media)) {
                $audio = collect($currentScene->media)
                    ->first(fn($file) => Str::endsWith($file, ['.mp3', '.wav', '.ogg']));
            } elseif (Str::endsWith($currentScene->media ?? '', ['.mp3', '.wav', '.ogg'])) {
                $audio = $currentScene->media;
            }

            return view('stories.scene', [
                'story' => $currentScene->story,
                'scene' => $currentScene,
                'audio' => $audio,
                'isEnding' => true
            ]);
        }

        $nextScene = Scene::findOrFail($choice->next_scene_id);

        // Jika next scene adalah ending → tampilkan di scene.blade.php
        if ($nextScene->is_ending) {
            $audio = null;
            if (is_array($nextScene->media)) {
                $audio = collect($nextScene->media)
                    ->first(fn($file) => Str::endsWith($file, ['.mp3', '.wav', '.ogg']));
            } elseif (Str::endsWith($nextScene->media ?? '', ['.mp3', '.wav', '.ogg'])) {
                $audio = $nextScene->media;
            }

            return view('stories.scene', [
                'story' => $currentScene->story,
                'scene' => $nextScene,
                'audio' => $audio,
                'isEnding' => true
            ]);
        }

        // Redirect ke scene berikutnya (bukan ending)
        return redirect()->route('stories.scene', [
            'story' => $currentScene->story->slug,
            'scene' => $nextScene->id
        ]);
    }
}