<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Mews\Purifier\Facades\Purifier;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('sanitize', function ($expression) {
            return "<?php echo \Mews\Purifier\Facades\Purifier::clean($expression); ?>";
        });
    }
}
