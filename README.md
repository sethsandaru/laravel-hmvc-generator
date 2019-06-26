# Laravel 5 Package - HMVC Architecture Generator
HVMC is a more-strongly design pattern based on MVC (Model-View-Controller). You got many advantages by using this pattern, especially if your project is very big.

Key advantages (M.O.R.E):

- Modularization: Reduction of dependencies between the disparate parts of the application.
- Organization: Having a folder for each of the relevant triads makes for a lighter work load.
- Reusability: By nature of the design it is easy to reuse nearly every piece of code.
- Extendibility: Makes the application more extensible without sacrificing ease of maintenance.

Find out more here: [HVMC - Wikipedia](https://en.wikipedia.org/wiki/Hierarchical_model%E2%80%93view%E2%80%93controller)
	
## Install & Update
Install using Composer:
```
composer require sethsandaru/laravel-hmvc-generator
```

Update using Composer:
```
composer update sethsandaru/laravel-hmvc-generator
```

## How to use?

### Notes
- If you're using Laravel 5.5+, then it's ok, the framework itself will do the ServiceProvider scanning process.
- If you're using Laravel 5.4 and below, please add the `HMVCServiceProvider` into the `providers` in `config/app.php`
    - Full namespace path: `SethPhat\HMVC\HMVCServiceProviderg`

### First Initialize
For the first time, please run this command:
```php
php artisan make:hmvc
```

If you see the successful message, you're done!

### Create a Module
Use this command to create a new module:
```php
php artisan hmvc:create_module <Module_Name>
```

A new module will be created inside the `app/Modules` folder.

### Config files
To add your own configuration file and use the `config` function, please open `config/hmvc.php`

You will see this:
```php
<?php
//...
return [
    'config_files' => [
        // your config file here
        // 'administration' => 'Modules/Administration/Configs/administration.php'
    ]
];
```

Following the instruction above. You must add a right path to your config file, no full path, just the path in `app` folder.

Example:
```php
<?php
//...
return [
    'config_files' => [
        'administration' => 'Modules/Administration/Configs/administration.php'
    ]
];
```

I will get the config out like this:
```php
<?php
//...
config('administration.some_key_here');
```
	
## Supporting the project
If you really like this project & want to contribute a little for the development. You can buy me a coffee. Thank you very much for your supporting ♥.

<a href="https://www.buymeacoffee.com/sethphat" target="_blank"><img src="https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png" alt="Buy Me A Coffee" style="height: auto !important;width: auto !important;" ></a>

Copyright &copy; 2018 by [Seth Phat](http://sethphat.com) aka Phat Tran Minh!
