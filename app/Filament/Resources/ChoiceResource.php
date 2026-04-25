<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChoiceResource\Pages;
use App\Models\Choice;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ChoiceResource extends Resource
{
    protected static ?string $model = Choice::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-right-circle';
    protected static ?string $navigationLabel = 'Choices';
    public static function getNavigationLabel(): string
    {
        return 'Pilihan';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Pilihan';
    }
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(12)
                    ->schema([

                        // ═══════════════════════════════
                        // KOLOM KIRI (8/12)
                        // ═══════════════════════════════
                        Forms\Components\Group::make()
                            ->schema([

                                // Section 1: Alur Scene
                                Forms\Components\Section::make('Alur Scene')
                                    ->description('Tentukan dari scene mana pilihan ini muncul dan ke scene mana pembaca diarahkan.')
                                    ->icon('heroicon-o-arrow-path')
                                    ->schema([

                                        Forms\Components\Select::make('scene_id')
                                            ->label('Dari Scene')
                                            ->relationship('scene', 'title')
                                            ->searchable()
                                            ->preload()
                                            ->required()
                                            ->live()
                                            ->placeholder('Pilih scene asal...')
                                            ->helperText('Scene tempat pilihan ini ditampilkan kepada pembaca.')
                                            ->columnSpan(6),

                                        Forms\Components\Select::make('next_scene_id')
                                            ->label('Menuju Scene')
                                            ->options(function (callable $get) {
                                                $sceneId = $get('scene_id');

                                                if (!$sceneId) return [];

                                                $scene = \App\Models\Scene::find($sceneId);

                                                if (!$scene) return [];

                                                return \App\Models\Scene::where('story_id', $scene->story_id)
                                                    ->pluck('title', 'id');
                                            })
                                            ->searchable()
                                            ->required()
                                            ->placeholder('Pilih scene tujuan...')
                                            ->helperText('Scene yang akan dibuka setelah pembaca memilih opsi ini.')
                                            ->columnSpan(6),

                                    ])
                                    ->columns(12),

                                // Section 2: Konten Pilihan
                                Forms\Components\Section::make('Konten Pilihan')
                                    ->description('Teks dan deskripsi yang ditampilkan sebagai opsi kepada pembaca.')
                                    ->icon('heroicon-o-chat-bubble-left-ellipsis')
                                    ->schema([

                                        Forms\Components\TextInput::make('text')
                                            ->label('Teks Pilihan')
                                            ->placeholder('Contoh: Masuk ke dalam hutan...')
                                            ->required()
                                            ->maxLength(255)
                                            ->helperText('Kalimat singkat yang muncul sebagai tombol pilihan.')
                                            ->columnSpanFull(),

                                        Forms\Components\Textarea::make('description')
                                            ->label('Deskripsi Tambahan')
                                            ->placeholder('Berikan konteks atau petunjuk tambahan untuk pilihan ini (opsional)...')
                                            ->rows(4)
                                            ->helperText('Opsional. Ditampilkan sebagai keterangan di bawah teks pilihan.')
                                            ->columnSpanFull(),

                                    ]),

                            ])
                            ->columnSpan(8),

                        // ═══════════════════════════════
                        // KOLOM KANAN (4/12)
                        // ═══════════════════════════════
                        Forms\Components\Group::make()
                            ->schema([

                                // Section: Pengaturan
                                Forms\Components\Section::make('Pengaturan')
                                    ->description('Konfigurasi urutan dan status pilihan ini.')
                                    ->icon('heroicon-o-cog-6-tooth')
                                    ->schema([

                                        Forms\Components\TextInput::make('order')
                                            ->label('Urutan Tampil')
                                            ->numeric()
                                            ->default(0)
                                            ->minValue(0)
                                            ->suffix('urutan')
                                            ->helperText('Pilihan dengan angka lebih kecil ditampilkan lebih awal.')
                                            ->columnSpanFull(),

                                        Forms\Components\Toggle::make('is_active')
                                            ->label('Aktifkan Pilihan')
                                            ->helperText('Nonaktifkan untuk menyembunyikan pilihan ini dari pembaca.')
                                            ->onColor('success')
                                            ->offColor('gray')
                                            ->default(true)
                                            ->columnSpanFull(),

                                    ]),

                                // Section: Informasi (edit form)
                                // Forms\Components\Section::make('Informasi')
                                //     ->description('Detail teknis pilihan ini.')
                                //     ->icon('heroicon-o-information-circle')
                                //     ->schema([

                                //         Forms\Components\Placeholder::make('created_at')
                                //             ->label('Dibuat')
                                //             ->content(fn($record) => $record?->created_at?->diffForHumans() ?? '-'),

                                //         Forms\Components\Placeholder::make('updated_at')
                                //             ->label('Terakhir Diubah')
                                //             ->content(fn($record) => $record?->updated_at?->diffForHumans() ?? '-'),

                                //     ])
                                //     ->columns(1)
                                //     ->collapsible()
                                //     ->collapsed(),

                            ])
                            ->columnSpan(4),

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('scene.title')
                    ->label('Dari')
                    ->searchable(),

                Tables\Columns\TextColumn::make('text')
                    ->label('Pilihan')
                    ->limit(30),

                Tables\Columns\TextColumn::make('nextScene.title')
                    ->label('Ke'),

                Tables\Columns\TextColumn::make('order')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Aktif'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('scene')
                    ->relationship('scene', 'title'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('order')
            ->groups([
                Tables\Grouping\Group::make('scene.story.title')
                    ->label('Cerita')
                    ->collapsible(),
            ])
            ->defaultGroup('scene.story.title');
    }
    

    public static function getRelations(): array
    {
        return [
            // nanti bisa dipakai di SceneRelationManager
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListChoices::route('/'),
            'create' => Pages\CreateChoice::route('/create'),
            'edit' => Pages\EditChoice::route('/{record}/edit'),
        ];
    }
}
