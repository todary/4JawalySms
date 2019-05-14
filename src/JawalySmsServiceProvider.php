<?php

namespace BTM\JawalySms;

use Illuminate\Support\ServiceProvider;

class JawalySmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/jawalysms.php';
        $this->publishes([$configPath => config_path('jawalysms.php')], 'config');
        $this->mergeConfigFrom($configPath, 'jawalysms');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('jawalysms', function ($app) {
            return new JawalySmsClient();



//            $config = isset($app['config']['services']['JawalySms']) ? $app['config']['services']['JawalySms'] : null;
//            if (is_null($config)) {
//                $config = $app['config']['JawalySms'] ?: $app['config']['JawalySms::config'];
//            }
//
//            $client = new JawalySmsClient($config['Username'], $config['Password'], $config['SenderName']);
//
//            return $client;
//

        });
    }

    public function provides() {
        return ['jawalysms'];
    }


}
