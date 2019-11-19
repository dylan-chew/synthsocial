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

        $allThemes = Theme::all();
        view()->share('allThemes', $allThemes);
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
