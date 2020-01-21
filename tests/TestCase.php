<?php

namespace DavideCasiraghi\LaravelFormPartials\Tests;

use DavideCasiraghi\LaravelFormPartials\Facades\LaravelFormPartials;
use DavideCasiraghi\LaravelFormPartials\LaravelFormPartialsServiceProvider;
use Illuminate\Foundation\Auth\User;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadLaravelMigrations(['--database' => 'testbench']);
        $this->withFactories(__DIR__.'/database/factories');
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelFormPartialsServiceProvider::class,
            //    \Mcamara\LaravelLocalization\LaravelLocalizationServiceProvider::class,
            //    \Dimsav\Translatable\TranslatableServiceProvider::class,
            \DavideCasiraghi\LaravelFormPartials\LaravelFormPartialsServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'LaravelFormPartials' => LaravelFormPartials::class, // facade called LaravelFormPartials and the name of the facade class
            //'LaravelLocalization' => \Mcamara\LaravelLocalization\Facades\LaravelLocalization::class,
        ];
    }

    // Authenticate the user
    public function authenticate()
    {
        $user = factory(User::class)->make();
        $this->actingAs($user);
    }

    // Authenticate the admin
    public function authenticateAsAdmin()
    {
        $user = factory(User::class)->make([
            'group' => 2,
        ]);

        $this->actingAs($user);
    }

    // Authenticate the super admin
    public function authenticateAsSuperAdmin()
    {
        $user = factory(User::class)->make([
            'group' => 1,
        ]);

        $this->actingAs($user);
    }

    protected function createUser()
    {
        User::forceCreate([
            'name' => 'User',
            'email' => 'user@email.com',
            'password' => 'test',
        ]);
    }
}
