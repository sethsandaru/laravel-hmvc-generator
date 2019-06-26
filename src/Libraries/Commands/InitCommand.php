<?php
/**
 * Created by PhpStorm.
 * User: Seth Phat
 * Date: 6/25/2019
 * Time: 10:33 PM
 */

namespace SethPhat\HMVC\Libraries\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InitCommand extends Command
{
    protected $signature = "make:hmvc";

    protected $description = "Initialize the HVMC Architecture for your project (First Time only)";

    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
        if (config()->has('hmvc.config_files')) {
            $this->info("[ERROR] You've already initialized. No need to run again.");
            return;
        }

        // make modules folder
        $modulePath = app_path('Modules');
        if (File::exists($modulePath)) {
            File::deleteDirectory($modulePath);
        }
        File::makeDirectory($modulePath);

        // copy provider file
        $providerPath = app_path("Providers/HMVCServiceProvider.php");
        if (File::exists($providerPath)) {
            File::delete($providerPath);
        }
        File::copy(__DIR__ . "/../HMVCServiceProvider.php", $providerPath);

        // publish vendor
        $this->call('vendor:publish', [
            '--tag' => 'hmvc_base'
        ]);

        $this->info('Initialized the HMVC Architecture successfully.');
    }
}