<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\Post;

class RecentActivitiesWidget extends BaseWidget
{
    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Post::query()->latest()->limit(5)
            )
            ->heading('Recent Activities')
            ->description('Latest posts added to your platform')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Activity')
                    ->description(fn (Post $record): string => 'Posted ' . $record->created_at->diffForHumans())
                    ->icon('heroicon-o-document-text')
                    ->iconColor('primary')
                    ->weight('bold'),
            ])
            ->paginated(false);
    }
}
