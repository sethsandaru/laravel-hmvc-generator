<?php
/**
 * Created by PhpStorm.
 * User: Seth Phat
 * Date: 10/15/2018
 * Time: 7:59 PM
 */
namespace App\Providers;

use Illuminate\Support\Facades\File;

trait HMVCRegisterProcess
{
    /**
     * Register bindings in the container.
     */
    private function _register()
    {
        if (!config()->has('hmvc.config_files')) {
            return;
        }

        // register
        $configFiles = config('hmvc.config_files');

        // register your config file here
        foreach ($configFiles as $alias => $path) {
            $this->mergeConfigFrom(app_path($path), $alias);
        }
    }

    /**
     * Perform post-registration booting of services.
     */
    private function _boot()
    {
        if (!config()->has('hmvc.config_files')) {
            return;
        }

        // booting modules
        $directories = array_map('basename', File::directories(app_path('Modules/')));
        foreach ($directories as $moduleName) {
            $this->_registerModule($moduleName);
        }
    }

    private function _registerModule($moduleName) {
        $modulePath = app_path('Modules/' . $moduleName . "/");

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