<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Main Content')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Forms\Set $set, ?string $state) => $set('slug', \Illuminate\Support\Str::slug($state)))
                            ->maxLength(255),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->unique(Post::class, 'slug', ignoreRecord: true)
                            ->maxLength(255),
                        Forms\Components\RichEditor::make('body')
                            ->required()
                            ->columnSpanFull(),
                    ])->columnSpan(2),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Publish')
                            ->schema([
                                Forms\Components\Placeholder::make('status')
                                    ->label('Status')
                                    ->content(fn (?Post $record) => $record === null ? 'New Post' : ($record->is_published ? 'Published' : 'Draft')),
                                Forms\Components\Placeholder::make('created_at')
                                    ->label('Post Date')
                                    ->content(fn (?Post $record) => $record?->created_at ? $record->created_at->format('M d, Y H:i A') : 'Not published yet'),
                                Forms\Components\Hidden::make('is_published')
                                    ->default(false),
                                Forms\Components\Actions::make([
                                    Forms\Components\Actions\Action::make('draft')
                                        ->label(fn (?Post $record) => $record?->is_published ? 'Revert to Draft' : 'Save as Draft')
                                        ->color('warning')
                                        ->action(function ($livewire) {
                                            $livewire->data['is_published'] = false;
                                            if (method_exists($livewire, 'save')) {
                                                $livewire->save();
                                            } elseif (method_exists($livewire, 'create')) {
                                                $livewire->create();
                                            }
                                        }),
                                    Forms\Components\Actions\Action::make('publish')
                                        ->label(fn (?Post $record) => $record === null || !$record->is_published ? 'Publish' : 'Update')
                                        ->color('primary')
                                        ->action(function ($livewire) {
                                            $livewire->data['is_published'] = true;
                                            if (method_exists($livewire, 'save')) {
                                                $livewire->save();
                                            } elseif (method_exists($livewire, 'create')) {
                                                $livewire->create();
                                            }
                                        }),
                                ]),
                            ]),
                        Forms\Components\Section::make('Meta Information')
                            ->schema([
                                Forms\Components\Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->required()
                                    ->searchable()
                                    ->preload(),
                                Forms\Components\FileUpload::make('featured_image')
                                    ->image()
                                    ->directory('blog')
                                    ->maxSize(5120) // 5MB max
                                    ->imageResizeTargetWidth(1920)
                                    ->imageResizeTargetHeight(1080)
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                    ->downloadable()
                                    ->deletable(),
                            ]),
                        Forms\Components\Section::make('SEO')
                            ->schema([
                                Forms\Components\Textarea::make('excerpt')
                                    ->rows(3)
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('meta_title')
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('meta_description')
                                    ->rows(3),
                                Forms\Components\TextInput::make('meta_keywords')
                                    ->placeholder('keyword1, keyword2, ...')
                                    ->maxLength(255),
                            ]),
                    ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('featured_image')
                    ->label('Thumbnail')
                    ->square()
                    ->defaultImageUrl(url('/placeholder.svg')),
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->weight(\Filament\Support\Enums\FontWeight::Bold)
                    ->description(fn (Post $record): string => 'Author: Admin', position: 'below'),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->badge()
                    ->color('info')
                    ->sortable(),
                Tables\Columns\TextColumn::make('is_published')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string|bool $state): string => $state ? 'success' : 'warning')
                    ->formatStateUsing(fn (string|bool $state): string => $state ? 'Published' : 'Draft'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->date('d F, Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('search')
                    ->form([
                        \Filament\Forms\Components\TextInput::make('search')
                            ->label('Search')
                            ->placeholder('Search posts...')
                            ->prefixIcon('heroicon-m-magnifying-glass'),
                    ])
                    ->query(function (\Illuminate\Database\Eloquent\Builder $query, array $data): \Illuminate\Database\Eloquent\Builder {
                        return $query->when(
                            $data['search'],
                            fn (\Illuminate\Database\Eloquent\Builder $query, $search): \Illuminate\Database\Eloquent\Builder => $query->where('title', 'like', "%{$search}%")
                        );
                    }),
                Tables\Filters\SelectFilter::make('category_id')
                    ->relationship('category', 'name')
                    ->label('All Categories'),
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('All Status')
                    ->trueLabel('Published')
                    ->falseLabel('Draft'),
            ], layout: \Filament\Tables\Enums\FiltersLayout::AboveContent)
            ->filtersFormColumns(3)
            ->striped()
            ->actions([
                Tables\Actions\Action::make('view')
                    ->url(fn (Post $record) => url('/blog/' . $record->slug))
                    ->openUrlInNewTab()
                    ->icon('heroicon-m-eye')
                    ->iconButton()
                    ->color('info'),
                Tables\Actions\EditAction::make()
                    ->iconButton()
                    ->color('primary'),
                Tables\Actions\DeleteAction::make()
                    ->iconButton()
                    ->color('danger'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
