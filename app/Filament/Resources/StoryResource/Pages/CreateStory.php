<?php

namespace App\Filament\Resources\StoryResource\Pages;

use App\Filament\Resources\StoryResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
use Illuminate\Support\Str;

class CreateStory extends CreateRecord
{
    protected static bool $canCreateAnother = false;


    protected static string $resource = StoryResource::class;

    /**
     * 🔥 Pastikan semua field aman sebelum insert
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // ✅ pastikan title ada
        if (empty($data['title'])) {
            throw new \Exception('Judul tidak boleh kosong');
        }

        // ✅ generate slug unik
        $slug = Str::slug($data['title']);

        $originalSlug = $slug;
        $count = 1;

        while (\App\Models\Story::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $data['slug'] = $slug;

        // ✅ fallback publish
        $data['is_published'] = $data['is_published'] ?? true;

        return $data;
    }

    /**
     * 🚀 Setelah story dibuat
     */


    /**
     * 🔔 Notifikasi sukses
     */
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Story berhasil dibuat 🎉')
            ->body('Scene awal otomatis dibuat. Lanjutkan dengan menambahkan pilihan.')
            ->success();
    }

    /**
     * 🔁 Redirect ke edit
     */
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // Redirect ke halaman List
    }
}
