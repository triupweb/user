<?php

namespace Triup\User\Providers;

use Illuminate\Support\ServiceProvider;
use Migrator\MigrationServiceProvider;
use Migrator\Migrator;
use Migrator\MigratorTrait as HasMigrations;
use Triup\User\Database\Factories\UserFactory;
use Triup\User\Database\Migrations\CreatePasswordResetsTable;
use Triup\User\Database\Migrations\CreateUsersTable;

class UserServiceProvider extends ServiceProvider
{
    use HasMigrations;

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerProviders();
        $this->registerMigrations();
        $this->registerFactories();

        $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/views','user');
    }

    /**
     * Register the package migrations.
     */
    protected function registerMigrations()
    {
        $this->migrations([
            CreateUsersTable::class,
            CreatePasswordResetsTable::class
        ], 'user-migrations');
    }


    protected function registerFactories()
    {
        (new UserFactory())->define();
    }

    protected function registerProviders()
    {
        $this->app->register(MigrationServiceProvider::class);
    }


}
