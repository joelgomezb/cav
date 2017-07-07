<?php
namespace Buzz\LaravelGoogleCaptcha;

use Illuminate\Support\ServiceProvider;

class CaptchaServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $app = $this->app;
        $this->bootConfig();
        $app['validator']->extend(
            'captcha', function ($attribute, $value) use ($app){
            return $app['captcha']->verify($value, $app['request']->getClientIp());
        }
        );
        if ($app->bound('form')) {
            $app['form']->macro(
                'captcha', function ($attributes = []) use ($app){
                return $app['captcha']->display($attributes, $app->getLocale());
            }
            );
        }
    }

    /**
     * //
     *
     * @return void
     */
    protected function bootConfig()
    {
        $path = __DIR__ . '/../config/config.php';
        $this->mergeConfigFrom($path, 'captcha');
        $this->publishes([$path => config_path('captcha.php')]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'captcha', function ($app){
            return new Captcha(
                $app['config']['captcha.secret'],
                $app['config']['captcha.sitekey']
            );
        }
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['captcha'];
    }
}