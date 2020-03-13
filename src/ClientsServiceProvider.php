<?php

namespace MsCart\Clients;

use Illuminate\Support\ServiceProvider;

class ClientsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
         $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'clients');
         $this->loadViewsFrom(__DIR__.'/../resources/views', 'clients');
         $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
         $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }

        \App::setLocale(\Setting::get('admin_language'));
        $menu =  \Menu::get('Sidebar');
        $acl = $menu->add(__('clients::clients.name'),    ['segment2'=>'clients', 'icon'=> 'icon-users4 '])->nickname('clients')->data('order', 1);
        $menu->clients->add(__('clients::clients.add_client'),config('app.admin_prefix').'/clients/create');
        $menu->clients->add(__('clients::clients.list'),config('app.admin_prefix').'/clients');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/clients.php', 'clients');

        // Register the service the package provides.
        $this->app->singleton('clients', function ($app) {
            return new Clients;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['clients'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/clients.php' => config_path('clients.php'),
        ], 'clients.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/mscart'),
        ], 'clients.views');*/

        // Publishing assets.
        $this->publishes([
            __DIR__.'/../resources/assets' => public_path('backend/vendor/mscart/clients/assets'),
        ], 'clients.views');

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/mscart'),
        ], 'clients.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
