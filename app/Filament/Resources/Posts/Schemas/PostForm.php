<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\CalloutBlock;
use App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\HeroBlock;
use App\Models\Post;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(12)
            ->components([
                Group::make([
                    TextInput::make('title')
                        ->label('Başlık')
                        ->required()
                        ->maxLength(255)
                        ->validationAttribute('başlık'),

                    RichEditor::make('content')
                        ->label('İçerik')
                        ->mergeTags([
                            'category_name',
                            'category_url',
                            'post_type_name',
                            'post_type_url',
                            'author_name',
                            'author_email',
                            'post_url',
                            'post_title',
                            'featured_image_url',
                            'gallery_first_url',
                            'attachment_first_url',
                        ])
                        ->customBlocks([
                            HeroBlock::class,
                            CalloutBlock::class,
                        ])
                        ->live(onBlur: true),

                    Textarea::make('excerpt')
                        ->label('Özet')
                        ->rows(3)
                        ->helperText('Yazının kısa özeti (isteğe bağlı)'),

                    TextInput::make('youtube_url')
                        ->label('YouTube URL')
                        ->url()
                        ->helperText('YouTube video bağlantısı (isteğe bağlı)')
                        ->placeholder('https://www.youtube.com/watch?v=...'),

                    Section::make('Medya Dosyaları')
                        ->description('Görseller ve ek dosyalar')
                        ->collapsible()
                        ->schema([
                            SpatieMediaLibraryFileUpload::make('gallery')
                                ->label('Galeri')
                                ->collection('gallery')
                                ->disk('public')
                                ->multiple()
                                ->image()
                                ->imageEditor()
                                ->reorderable()
                                ->columnSpanFull(),

                            SpatieMediaLibraryFileUpload::make('attachments')
                                ->label('Ekler')
                                ->disk('public')
                                ->collection('attachments')
                                ->multiple()
                                ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                                ->columnSpanFull(),
                        ]),
                ])->columnSpan(['lg' => 8]),

                Group::make([
                    Section::make('Etiketler')
                        ->schema([
                            SpatieTagsInput::make('tags')
                                ->label('Etiketler')
                                ->columnSpanFull(),
                        ]),

                    Section::make('İlişkiler')
                        ->schema([
                            Select::make('post_type_id')
                                ->label('Yazı Türü')
                                ->relationship('postType', 'name')
                                ->required()
                                ->searchable()
                                ->preload()
                                ->live()
                                ->afterStateUpdated(fn (callable $set) => $set('category_id', null)),

                            Select::make('category_id')
                                ->label('Kategori')
                                ->relationship('category', 'name', fn ($query, $get) => 
                                    $get('post_type_id') 
                                        ? $query->where('post_type_id', $get('post_type_id'))
                                        : $query->whereRaw('1 = 0')
                                )
                                ->required()
                                ->searchable()
                                ->preload()
                                ->disabled(fn (Get $get): bool => ! $get('post_type_id'))
                                ->placeholder(fn (Get $get): string => $get('post_type_id') ? 'Kategori seçin...' : 'Önce yazı türü seçin')
                                ->helperText(fn (Get $get): string => $get('post_type_id') ? 'Seçilen yazı türüne ait kategoriler' : 'Kategori seçmek için önce yazı türü seçmelisiniz'),

                            Select::make('parent_id')
                                ->label('Üst Yazı')
                                ->relationship('parent', 'title')
                                ->searchable()
                                ->preload()
                                ->placeholder('Ana yazı seçin (isteğe bağlı)')
                                ->helperText('Bu yazıyı başka bir yazının alt yazısı yapmak için seçin')
                                ->getOptionLabelFromRecordUsing(fn (Post $record): string => get_translation_with_fallback($record, 'title')),

                            Select::make('form_id')
                                ->label('Form')
                                ->relationship('form', 'name')
                                ->searchable()
                                ->preload()
                                ->placeholder('Form seçin (isteğe bağlı)')
                                ->helperText('Bu yazıya özel form bağlamak için seçin'),
                        ]),

                    Section::make('Durum')
                        ->schema([
                            Select::make('status')
                                ->label('Durum')
                                ->options([
                                    'draft' => 'Taslak',
                                    'published' => 'Yayınlandı',
                                    'archived' => 'Arşivlendi',
                                ])
                                ->default('draft')
                                ->required(),

                            Toggle::make('is_featured')
                                ->label('Öne Çıkan')
                                ->default(false),
                        ]),

                    Section::make('Görseller')
                        ->schema([
                            SpatieMediaLibraryFileUpload::make('cover_image')
                                ->disk('public')
                                ->label('Kapak Fotoğrafı')
                                ->collection('cover_image')
                                ->image()
                                ->imageEditor()
                                ->imageEditorAspectRatios([
                                    '16:9',
                                    '4:3',
                                    '1:1',
                                ])
                                ->columnSpanFull()
                                ->helperText('Yazının ana kapak görseli'),

                            SpatieMediaLibraryFileUpload::make('featured_image')
                                ->disk('public')
                                ->label('Öne Çıkan Görsel')
                                ->collection('featured_image')
                                ->image()
                                ->imageEditor()
                                ->imageEditorAspectRatios([
                                    '16:9',
                                    '4:3',
                                    '1:1',
                                ])
                                ->columnSpanFull(),
                        ]),

                    Section::make('Meta Alanları')
                        ->description('Yazı türüne özel ek bilgiler')
                        ->collapsible()
                        ->schema([
                            ...self::getMetaFieldsSchema(),
                        ])
                        ->visible(fn (Get $get): bool => ! empty($get('post_type_id'))),
                ])->columnSpan(['lg' => 4]),
            ]);
    }

    /**
     * Meta alanları için dinamik form schema oluşturur
     */
    public static function getMetaFieldsSchema(): array
    {
        return [
            TextInput::make('meta.event_date')
                ->label('Etkinlik Tarihi')
                ->type('datetime-local')
                ->visible(fn (Get $get): bool => self::isPostType($get, ['Event', 'Etkinlik']))
                ->required(fn (Get $get): bool => self::isPostType($get, ['Event', 'Etkinlik'])),

            TextInput::make('meta.location')
                ->label('Konum')
                ->visible(fn (Get $get): bool => self::isPostType($get, ['Event', 'Etkinlik']))
                ->required(fn (Get $get): bool => self::isPostType($get, ['Event', 'Etkinlik'])),

            TextInput::make('meta.map_url')
                ->label('Harita Linki')
                ->type('url')
                ->placeholder('https://maps.google.com/...')
                ->visible(fn (Get $get): bool => self::isPostType($get, ['Event', 'Etkinlik'])),
        ];
    }

    /**
     * Post type kontrolü yapar
     */
    private static function isPostType(Get $get, array $postTypes): bool
    {
        $postTypeId = $get('post_type_id');

        if (! $postTypeId) {
            return false;
        }

        $postType = \App\Models\PostType::find($postTypeId);

        if (! $postType) {
            return false;
        }

        $postTypeName = get_translation_with_fallback($postType, 'name');

        return in_array($postTypeName, $postTypes);
    }
}
