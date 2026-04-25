<?php

namespace App\Filament\Resources\ChoiceResource\Pages;

use App\Filament\Resources\ChoiceResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateChoice extends CreateRecord
{
    protected static string $resource = ChoiceResource::class;

    /**
     * 🔥 Validasi & manipulasi sebelum simpan
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // ❌ Cegah scene menuju dirinya sendiri
        if ($data['scene_id'] == $data['next_scene_id']) {
            throw new \Exception('Scene tidak boleh menuju dirinya sendiri!');
        }

        return $data;
    }

    /**
     * 🚀 Setelah create
     */
    protected function afterCreate(): void
    {
        // Optional: bisa dipakai untuk logging atau analytics nanti
    }

    /**
     * 🔔 Notifikasi sukses
     */
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('[PPilihan] berhasil dibuat 🔀')
            ->body('Branching cerita berhasil ditambahkan.')
            ->success();
    }

    /**
     * 🔁 Redirect ke edit (biar lanjut setting)
     */
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // Redirect ke halaman List
    }
}