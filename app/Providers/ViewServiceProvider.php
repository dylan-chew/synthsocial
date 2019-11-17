<?php

namespace App\Providers;

use App\Theme;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $defaultTheme = Theme::where('is_default', 1)->first();
        view()->share('defaultTheme', $defaultTheme);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
