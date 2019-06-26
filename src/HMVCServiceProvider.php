<?php
/**
 * Created by PhpStorm.
 * User: Seth Phat
 * Date: 6/25/2019
 * Time: 10:18 PM
 */

namespace SethPhat\HMVC;


use App\Providers\HMVCRegisterProcess;
use Illuminate\Support\ServiceProvider;
use SethPhat\HMVC\Libraries\Commands\CreateModuleCommand;
use SethPhat\HMVC\Libraries\Commands\InitCommand;

class HMVCServiceProvider extends ServiceProvider
{
    use HMVCRegisterProcess;

    // register process
    public function register() {
        $this->_register();
    }

    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        // register command
        if ($this->app->runningInConsole()) {
            $this->commands([
                InitCommand::class,
                CreateModuleCommand::class,
            ]);
        }

        // publish the config
        $this->publishes([
            __DIR__.'/Base/hmvc.php' => config_path('hmvc.php'),
        ], 'hmvc_base');

        // boot HMVC
        $this->_boot();
    }
}