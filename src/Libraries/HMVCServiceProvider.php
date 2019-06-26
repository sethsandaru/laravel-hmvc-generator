<?php
/**
 * Created by PhpStorm.
 * User: Seth Phat
 * Date: 10/15/2018
 * Time: 7:59 PM
 */
namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class HMVCServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     */
    public function register()
    {
        $configFiles = config('hmvc.config_files');
        // register your config file here
        foreach ($configFiles as $alias => $path) {
            $this->mergeConfigFrom(app_path($path), $alias);
        }
    }

    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        $directories = array_map('basename', File::directories(app_path('Modules/')));
        foreach ($directories as $moduleName) {
            $this->_registerModule($moduleName);
        }
    }

    private function _registerModule($moduleName) {
        $modulePath = __DIR__ . "/../Modules/$moduleName/";

        // boot route
        if (File::exists($modulePath . "routes.php")) {
            $this->loadRoutesFrom($modulePath . "routes.php");
        }

        // boot migration
        if (File::exists($modulePath . "Migrations")) {
            $this->loadMigrationsFrom($modulePath . "Migrations");
        }

        // boot languages
        if (File::exists($modulePath . "Languages")) {
            $this->loadTranslationsFrom($modulePath . "Languages", $moduleName);
        }

        // boot views
        if (File::exists($modulePath . "Views")) {
            $this->loadViewsFrom($modulePath . "Views", $moduleName);
        }
    }
}