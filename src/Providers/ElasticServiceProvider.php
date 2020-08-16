<?php

namespace Cirelramostrabajo\Plogger\Providers;
use Illuminate\Support\ServiceProvider;

class ElasticServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->setUpConfig();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    protected function setUpConfig()
    {
        if ($this->app instanceof LaravelApplication) {
            $this->publishes([
                __DIR__ . '/config/elastic.php' => config_path('elastic.php')
            ], 'config');
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('elastic');
        }

        $this->mergeConfigFrom($source, 'elastic');
    }
}
