<?php

namespace App\Filament\Resources\SceneResource\Pages;

use App\Filament\Resources\SceneResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateScene extends CreateRecord
{
    protected static string $resource = SceneResource::class;

    

    
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (!empty($data['is_start'])) {
            \App\Models\Scene::where('story_id', $data['story_id'])
                ->update(['is_start' => false]);
        }

        return $data;
    }

    /**
     * 🚀 Setelah create
     */
    protected function afterCreate(): void
    {
        // kalau belum ada scene awal, jadikan ini default
        $hasStart = \App\Models\Scene::where('story_id', $this->record->story_id)
            ->where('is_start', true)
            ->exists();

        if (!$hasStart) {
            $this->record->update(['is_start' => true]);
        }
    }

    /**
     * 🔔 Notifikasi sukses
     */
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Scene berhasil dibuat 🎬')
            ->body('Sekarang tambahkan pilihan (choice) untuk branching.')
            ->success();
    }

    /**
     * 🔁 Redirect biar lanjut edit
     */
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // Redirect ke halaman List
    }
}