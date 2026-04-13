<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    public function getTitle(): string | \Illuminate\Contracts\Support\Htmlable
    {
        return 'Post Management';
    }

    public function getSubheading(): string | \Illuminate\Contracts\Support\Htmlable | null
    {
        $count = static::getResource()::getEloquentQuery()->count();
        return "View and manage all blog posts (Total: {$count} posts)";
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('New Post')
                ->icon('heroicon-o-plus'),
        ];
    }
}
