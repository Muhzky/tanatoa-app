<?php

namespace App\Filament\Resources\StoryResource\Pages;

use App\Filament\Resources\StoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStories extends ListRecords
{
    protected static string $resource = StoryResource::class;

    /**
     * 🔝 Header Actions (atas)
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Story')
                ->icon('heroicon-o-plus')
                ->color('primary'),
        ];
    }

    /**
     * 📊 Optional: Empty state (kalau belum ada data)
     */
    protected function getEmptyStateHeading(): ?string
    {
        return 'Belum ada cerita';
    }

    protected function getEmptyStateDescription(): ?string
    {
        return 'Mulai dengan membuat story interaktif pertama kamu 🚀';
    }

    protected function getEmptyStateActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Buat Story Pertama'),
        ];
    }
}