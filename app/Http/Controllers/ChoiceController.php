<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use App\Models\Scene;
use Illuminate\Http\Request;

class ChoiceController extends Controller
{
    
    public function select($id)
    {
        $choice = Choice::with(['scene.story'])->findOrFail($id);

        // Validasi choice aktif
        if (isset($choice->is_active) && !$choice->is_active) {
            abort(400, 'Pilihan ini tidak tersedia');
        }

        // Simpan progress di session
        session([
            'story_id' => $choice->scene->story_id,
            'story_slug' => $choice->scene->story->slug,
            'scene_id' => $choice->next_scene_id
        ]);

        // Jika tidak ada next_scene_id, tampilkan ending
        if (!$choice->next_scene_id) {
            return view('stories.ending', [
                'story' => $choice->scene->story,
                'scene' => $choice->scene
            ]);
        }

        // Ambil scene berikutnya
        $nextScene = Scene::findOrFail($choice->next_scene_id);

        // Jika next scene adalah ending
        if ($nextScene->is_ending) {
            return view('stories.ending', [
                'story' => $choice->scene->story,
                'scene' => $nextScene
            ]);
        }

        
        return redirect()->route('stories.scene', [
            'story' => $choice->scene->story->slug,
            'scene' => $choice->next_scene_id
        ]);
    }

    /**
     * Preview choice (untuk admin)
     */
    public function preview($id)
    {
        $choice = Choice::with(['scene.story', 'nextScene'])->findOrFail($id);
        
        return view('admin.choices.preview', compact('choice'));
    }

    /**
     * Simpan choice baru
     */
    public function store(Request $request, $sceneId)
    {
        $validated = $request->validate([
            'text' => 'required|string|max:255',
            'description' => 'nullable|string',
            'next_scene_id' => 'required|exists:scenes,id',
            'order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        $choice = \App\Models\Choice::create([
            'scene_id' => $sceneId,
            'text' => $validated['text'],
            'description' => $validated['description'] ?? null,
            'next_scene_id' => $validated['next_scene_id'],
            'order' => $validated['order'] ?? 0,
            'is_active' => $validated['is_active'] ?? true,
        ]);

        return redirect()->back()->with('success', 'Choice berhasil ditambahkan');
    }

    /**
     * Update choice
     */
    public function update(Request $request, $id)
    {
        $choice = \App\Models\Choice::findOrFail($id);

        $validated = $request->validate([
            'text' => 'required|string|max:255',
            'description' => 'nullable|string',
            'next_scene_id' => 'required|exists:scenes,id',
            'order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        $choice->update($validated);

        return redirect()->back()->with('success', 'Choice berhasil diupdate');
    }

    /**
     * Delete choice
     */
    public function destroy($id)
    {
        $choice = \App\Models\Choice::findOrFail($id);
        $choice->delete();

        return redirect()->back()->with('success', 'Choice berhasil dihapus');
    }

    /**
     * Reorder choices
     */
    public function reorder(Request $request, $sceneId)
    {
        $validated = $request->validate([
            'choices' => 'required|array',
            'choices.*.id' => 'required|exists:choices,id',
            'choices.*.order' => 'required|integer|min:0',
        ]);

        foreach ($validated['choices'] as $choiceData) {
            \App\Models\Choice::where('id', $choiceData['id'])
                ->update(['order' => $choiceData['order']]);
        }

        return response()->json(['success' => true]);
    }
}