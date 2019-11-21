<?php

namespace App\Providers;

use App\Theme;
use http\Cookie;
use Illuminate\Http\Request;
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
        //If running into error when Migrating comment out these two blocks.

        //send the default theme as variable to views
        $defaultTheme = Theme::where('is_default', 1)->first();
        view()->share('defaultTheme', $defaultTheme);

        //send all themes as array to views to load in theme drop down
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
