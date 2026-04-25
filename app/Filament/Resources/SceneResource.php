<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SceneResource\Pages;
use App\Models\Scene;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SceneResource extends Resource
{
    protected static ?string $model = Scene::class;

    protected static ?string $navigationIcon = 'heroicon-o-film';
    protected static ?string $navigationLabel = 'Scenes';
    public static function getNavigationLabel(): string
    {
        return 'Scene';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Scene';
    }
    protected static ?int $navigationSort = 2;

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

                                // Section 1: Identitas Scene
                                Forms\Components\Section::make('Identitas Scene')
                                    ->description('Tentukan scene ini milik story mana dan beri judul yang jelas.')
                                    ->icon('heroicon-o-document-text')
                                    ->schema([

                                        Forms\Components\Select::make('story_id')
                                            ->label('Story')
                                            ->relationship('story', 'title')
                                            ->searchable()
                                            ->preload()
                                            ->required()
                                            ->live()
                                            ->placeholder('Pilih story...')
                                            ->helperText('Scene ini akan menjadi bagian dari story yang dipilih.')
                                            ->columnSpanFull(),

                                        Forms\Components\TextInput::make('title')
                                            ->label('Judul Scene')
                                            ->placeholder('Contoh: Di Dalam Hutan Gelap...')
                                            ->maxLength(255)
                                            ->helperText('Opsional, namun membantu identifikasi scene.')
                                            ->columnSpanFull(),

                                    ])
                                    ->columns(1),

                                // Section 2: Konten Narasi
                                Forms\Components\Section::make('Konten Narasi')
                                    ->description('Tulis narasi yang akan ditampilkan kepada pembaca.')
                                    ->icon('heroicon-o-pencil-square')
                                    ->schema([

                                        Forms\Components\Textarea::make('content')
                                            ->label('Isi Narasi')
                                            ->rows(10)
                                            ->required()
                                            ->placeholder('Tulis isi narasi scene di sini...')
                                            ->helperText('Gunakan narasi yang jelas dan menarik untuk menggambarkan scene.')
                                            ->columnSpanFull(),

                                    ]),

                                // Section 3: Media Pendukung
                                Forms\Components\Section::make('Media Pendukung')
                                    ->description('Upload gambar, video, atau audio untuk memperkaya pengalaman scene.')
                                    ->icon('heroicon-o-photo')
                                    ->schema([

                                        Forms\Components\FileUpload::make('media_visual')
                                            ->label('Media Visual (Gambar / Video)')
                                            ->disk('public')
                                            ->directory('scenes/visual')
                                            ->imagePreviewHeight('200')
                                            ->acceptedFileTypes([
                                                'image/*',
                                                'video/mp4',
                                                'video/webm',
                                            ])
                                            ->maxSize(102400) // 100MB
                                            ->helperText('Upload gambar atau video')
                                            ->columnSpanFull(),

                                        Forms\Components\FileUpload::make('media_audio')
                                            ->label('Audio Narasi')
                                            ->disk('public')
                                            ->directory('scenes/audio')
                                            ->acceptedFileTypes([
                                                'audio/mpeg',
                                                'audio/mp3',
                                                'audio/wav',
                                            ])
                                            ->maxSize(102400) // 100MB
                                            ->helperText('Upload audio narasi')
                                            ->columnSpanFull(),

                                    ])
                                    ->columns(3)
                                    ->collapsible(),

                            ])
                            ->columnSpan(8),

                        // ═══════════════════════════════
                        // KOLOM KANAN (4/12)
                        // ═══════════════════════════════
                        Forms\Components\Group::make()
                            ->schema([

                                // Section: Pengaturan Scene
                                Forms\Components\Section::make('Pengaturan Scene')
                                    ->description('Konfigurasi peran scene dalam alur cerita.')
                                    ->icon('heroicon-o-cog-6-tooth')
                                    ->schema([

                                        Forms\Components\TextInput::make('order')
                                            ->label('Urutan Tampil')
                                            ->numeric()
                                            ->default(0)
                                            ->minValue(0)
                                            ->suffix('urutan')
                                            ->helperText('Angka lebih kecil ditampilkan lebih awal.')
                                            ->columnSpanFull(),

                                        Forms\Components\Toggle::make('is_start')
                                            ->label('Scene Awal')
                                            ->helperText('Jadikan ini scene pembuka story. Hanya satu per story.')
                                            ->onColor('success')
                                            ->offColor('gray')
                                            ->columnSpanFull(),

                                        Forms\Components\Toggle::make('is_ending')
                                            ->label('Scene Ending')
                                            ->helperText('Jika aktif, scene ini tidak memerlukan pilihan lanjutan.')
                                            ->onColor('danger')
                                            ->offColor('gray')
                                            ->columnSpanFull(),

                                    ])
                                    ->columns(1),

                                // Section: Informasi (Read-only, opsional untuk edit form)
                                // Forms\Components\Section::make('Informasi')
                                //     ->description('Detail teknis scene ini.')
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
                Tables\Columns\TextColumn::make('story.title')
                    ->label('Story')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('title')
                    ->limit(30)
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_start')
                    ->boolean()
                    ->label('Start'),

                Tables\Columns\IconColumn::make('is_ending')
                    ->boolean()
                    ->label('Ending'),

                Tables\Columns\TextColumn::make('order')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M Y'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('story')
                    ->relationship('story', 'title'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('order')
            ->groups([
                Tables\Grouping\Group::make('story.title')
                    ->label('Cerita')
                    ->collapsible(),
            ])
            ->defaultGroup('story.title');
    }

    public static function getRelations(): array
    {
        return [
            // nanti kita masukin ChoiceRelationManager 🔥
        ];
    }

    public static function mutateFormDataBeforeCreate(array $data): array
    {
        if (!empty($data['is_start']) && $data['is_start']) {
            Scene::where('story_id', $data['story_id'])
                ->update(['is_start' => false]);
        }

        return $data;
    }

    public static function mutateFormDataBeforeSave(array $data): array
    {
        if (!empty($data['is_start']) && $data['is_start']) {
            Scene::where('story_id', $data['story_id'])
                ->where('id', '!=', request()->route('record'))
                ->update(['is_start' => false]);
        }

        return $data;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListScenes::route('/'),
            'create' => Pages\CreateScene::route('/create'),
            'edit' => Pages\EditScene::route('/{record}/edit'),
        ];
    }
}
