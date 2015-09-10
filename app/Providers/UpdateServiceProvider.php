<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Console\Commands\Update;

class UpdateServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('command.update', function () {
            return new Update;
        });

        $this->commands(
            'command.update'
        );
    }
}
