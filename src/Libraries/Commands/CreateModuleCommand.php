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
use Illuminate\Support\Str;
use Symfony\Component\Console\Exception\InvalidArgumentException;

class CreateModuleCommand extends Command
{
    const MODULE_PATH = "Modules/";
    const NEEDED_FOLDERS = [
        'Controllers',
        'Configs',
        'Migrations',
        'Languages',
        'Views',
    ];

    protected $signature = "hmvc:create_module {name}";

    protected $description = "Create new module. Remember to input the name";

    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
        try {
            $name = $this->argument('name');
            $name = ucfirst(Str::camel($name)); // turn it to camelCase but => CamelCase (first upper case)

            // create module here
            $modulePath = app_path(static::MODULE_PATH . $name);
            if (File::exists($modulePath)) {
                $this->error("Module already created in the Modules folder. Aborted!");
                return;
            }

            // ok, available
            File::makeDirectory($modulePath);
            $this->info("Created Module $name Folder");

            // create route file
            $file = fopen(app_path(static::MODULE_PATH . $name . "/" . "routes.php"), "a+");
            $this->_writeRoute($file);

            // create needed folders
            foreach (static::NEEDED_FOLDERS as $folder_name) {
                $path = app_path(static::MODULE_PATH . $name . "/" . $folder_name);
                File::makeDirectory($path);
                $this->info("Created $folder_name in Module $name");
            }

            // success message
            $this->info("Created Module $name successfully!");
        } catch (InvalidArgumentException $e) {
            $this->error("Please input the module name.");
        } catch (\Exception $e) {
            $this->error("Unknown Error: {$e->getMessage()}");
        }
    }

    private function _writeRoute(&$file) {
        fwrite($file, "<?php\r\n");
        fwrite($file, "// Hello from Seth Phat - https://sethphat.com - https://github.com/sethsandaru\r\n");
        fwrite($file, "// Your route for the module is here, define it :D\r\n");
        fwrite($file, "// Route::get('/path', 'Controller@method');\r\n");
        fclose($file);
    }
}