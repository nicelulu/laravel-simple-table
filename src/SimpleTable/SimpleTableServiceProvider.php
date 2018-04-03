<?php namespace SimpleTable;

// liuxiaolu@dankegongyu.com

use Illuminate\Support\ServiceProvider;

class SimpleTableServiceProvider extends ServiceProvider
{
    public function boot()
    {
        /** @var \Illuminate\Foundation\Application $app */
        $app = $this->app;
        if ($app->runningInConsole()) {
        }

    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->publishConfigs();
        $this->publishAssets();

        // views
        $this->loadViewsFrom($this->path('resources/views'), 'try-make-package');
    }

    private function publishAssets()
    {
        $this->publishes(
            [
                $this->path('public/') => public_path(),
            ]
        );
    }

    private function publishConfigs()
    {
        $config = $this->path('config/simple_table.php');
        $this->publishes([$config => config_path('simple_table.php')], 'config');
        $this->mergeConfigFrom($config, 'simple_table');
    }

    private function path($path = '')
    {
        return __DIR__ . '/../../' . $path;
    }
}