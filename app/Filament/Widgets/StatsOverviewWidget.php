<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\ContactSubmission;
use App\Models\Post;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;
    protected int | string | array $columnSpan = 'full';

    protected function getColumns(): int
    {
        return 4;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Total Posts', Post::count())
                ->icon('heroicon-o-document-text')
                ->color('primary'),
            Stat::make('Categories', Category::count())
                ->icon('heroicon-o-tag')
                ->color('info'),
            Stat::make('Total Inquiries', ContactSubmission::count())
                ->icon('heroicon-o-envelope')
                ->color('success'),
            Stat::make('Total Users', User::count())
                ->icon('heroicon-o-users')
                ->color('danger'),
        ];
    }
}
