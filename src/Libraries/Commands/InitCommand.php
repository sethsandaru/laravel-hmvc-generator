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
        // make modules folder
        File::makeDirectory(app_path('Modules'));

        // copy file
        File::copy(__DIR__ . "/../HMVCServiceProvider.php", app_path("Providers/HMVCServiceProvider.php"));

        // publish vendor
        $this->call('vendor:publish', [
            'tag' => 'hmvc_base'
        ]);

        $this->info('Initialized the HMVC Architecture successfully.');
    }
}