<?php

namespace App\Filament\Pages;

use Filament\Facades\Filament;
use Filament\Pages\Dashboard as BaseDashboard;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;

class Dashboard extends BaseDashboard
{
    // Override the default header to look like the reference mockup
    public function getTitle(): string | Htmlable
    {
        return 'Dashboard';
    }

    public function getSubheading(): string | Htmlable | null
    {
        return 'Welcome to the Admin Panel';
    }

    // You can optionally override getHeaderWidgets() or use discoverWidgets fallback.
}
