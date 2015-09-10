<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (! \App::runningInConsole()) {
            $menu = file(base_path().'/resources/content/menu.md', FILE_IGNORE_NEW_LINES);
            sort($menu);
            view()->share('menu', $menu);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
