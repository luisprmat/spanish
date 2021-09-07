<?php

namespace Luisprmat\Spanish\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class InstallCommand extends Command
{
    protected $signature = 'lang:add-spanish {--I|inline : install validation.php with generic attributes (no name for attribute)}';

    protected $description = 'Install translations for spanish language';

    public function handle()
    {
        (new Filesystem)->ensureDirectoryExists(resource_path('lang/es'));

        copy(__DIR__.'/../../vendor/laravel-lang/lang/locales/es/auth.php', resource_path('lang/es/auth.php'));
        copy(__DIR__.'/../../vendor/laravel-lang/lang/locales/es/pagination.php', resource_path('lang/es/pagination.php'));
        copy(__DIR__.'/../../vendor/laravel-lang/lang/locales/es/passwords.php', resource_path('lang/es/passwords.php'));

        if ($this->option('inline')) {
            copy(__DIR__.'/../../vendor/laravel-lang/lang/locales/es/validation-inline.php', resource_path('lang/es/validation.php'));
        } else {
            copy(__DIR__.'/../../vendor/laravel-lang/lang/locales/es/validation.php', resource_path('lang/es/validation.php'));
        }

        $this->info('Language installed successful');
    }
}