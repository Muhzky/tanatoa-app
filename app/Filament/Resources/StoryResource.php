<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StoryResource\Pages;
use App\Models\Story;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class StoryResource extends Resource
{
    protected static ?string $model = Story::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Stories';
    protected static ?string $pluralLabel = 'Stories';
    public static function getNavigationLabel(): string
    {
        return 'Cerita';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Cerita';
    }
    protected static ?int $navigationSort = 1;

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

                                // Section 1: Informasi Utama
                                Forms\Components\Section::make('Informasi Utama')
                                    ->description('Judul dan identitas unik cerita yang akan ditampilkan ke pembaca.')
                                    ->icon('heroicon-o-book-open')
                                    ->schema([

                                        Forms\Components\TextInput::make('title')
                                            ->label('Judul Cerita')
                                            ->required()
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(
                                                fn($state, callable $set) =>
                                                $set('slug', Str::slug($state))
                                            )
                                            ->maxLength(255)
                                            ->placeholder('Contoh: Petualangan di Negeri Ajaib')
                                            ->helperText('Judul akan digunakan sebagai identitas utama cerita.')
                                            ->columnSpan(8),

                                        Forms\Components\TextInput::make('slug')
                                            ->label('Slug URL')
                                            ->disabled()
                                            ->dehydrated()
                                            ->required()
                                            ->prefix('/')
                                            ->helperText('Dibuat otomatis dari judul.')
                                            ->columnSpan(4),

                                    ])
                                    ->columns(12),

                                // Section 2: Deskripsi
                                Forms\Components\Section::make('Deskripsi Cerita')
                                    ->description('Gambaran singkat cerita untuk menarik minat pembaca.')
                                    ->icon('heroicon-o-pencil-square')
                                    ->schema([

                                        Forms\Components\Textarea::make('description')
                                            ->label('Deskripsi')
                                            ->rows(6)
                                            ->placeholder('Ceritakan gambaran singkat, suasana, dan daya tarik cerita ini...')
                                            ->helperText('Deskripsi yang baik meningkatkan ketertarikan pembaca.')
                                            ->columnSpanFull(),

                                    ]),

                            ])
                            ->columnSpan(8),

                        // ═══════════════════════════════
                        // KOLOM KANAN (4/12)
                        // ═══════════════════════════════
                        Forms\Components\Group::make()
                            ->schema([

                                // Section: Cover Image
                                Forms\Components\Section::make('Cover Cerita')
                                    ->description('Gambar sampul yang mewakili cerita ini.')
                                    ->icon('heroicon-o-photo')
                                    ->schema([

                                        Forms\Components\FileUpload::make('cover_image')
                                            ->label(false)
                                            ->image()
                                            ->disk('public')
                                            ->directory('stories')
                                            ->visibility('public')
                                            ->imageEditor(false)
                                            ->imagePreviewHeight('220')
                                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                            ->helperText('Format: JPG, PNG, WebP.')
                                            ->columnSpanFull(),

                                    ]),

                                // Section: Status Publikasi
                                Forms\Components\Section::make('Status Publikasi')
                                    ->description('Atur visibilitas cerita untuk pembaca.')
                                    ->icon('heroicon-o-eye')
                                    ->schema([

                                        Forms\Components\Toggle::make('is_published')
                                            ->label('Publikasikan Cerita')
                                            ->helperText('Aktifkan agar cerita dapat diakses oleh pembaca.')
                                            ->onColor('success')
                                            ->offColor('gray')
                                            ->default(true)
                                            ->columnSpanFull(),

                                    ]),

                                // Section: Informasi (edit form)
                                // Forms\Components\Section::make('Informasi')
                                //     ->description('Detail teknis cerita ini.')
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
                Tables\Columns\ImageColumn::make('cover_image')
                    ->disk('public')
                    ->size(50),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->toggleable(),

                Tables\Columns\IconColumn::make('is_published')
                    ->boolean()
                    ->label('Published'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Published'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // nanti kita isi SceneRelationManager di sini 🔥
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStories::route('/'),
            'create' => Pages\CreateStory::route('/create'),
            'edit' => Pages\EditStory::route('/{record}/edit'),
        ];
    }
}
