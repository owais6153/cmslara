<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Settings;
use App\Models\GlobalSettings;
use View;
class SettingsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Models\GlobalSettings', function ($app) {
            return new GlobalSettings(Settings::all());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(GlobalSettings $settinsInstance)
    {        
        View::share('globalsettings', $settinsInstance);
    }
}
