<?php
namespace Kaankilic\LaravelCloudflare\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Container\Container;
use Kaankilic\LaravelCloudflare\Factories\AdapterFactory;
use Kaankilic\LaravelCloudflare\Factories\CloudflareFactory;
use Kaankilic\LaravelCloudflare\CloudflareManager;
class CloudflareServiceProvider extends ServiceProvider{
	protected $defer = false;
	public function boot(){
		$default = realpath(__DIR__.'/../../config/cloudflare.php');
		$this->publishes([$default => config_path('cloudflare.php')]);
		$this->mergeConfigFrom($default, 'cloudflare');
	}
	public function register(){
		$this->app->singleton('cloudflare.adapter', function () {
			return new AdapterFactory();
		});
		$this->app->singleton('cloudflare.factory', function (Container $app) {
			return new CloudflareFactory($app['cloudflare.adapter']);
		});
		$this->app->singleton('cloudflare', function (Container $app) {
			return new CloudflareManager($app['config'], $app['cloudflare.factory']);
		});
		$this->app->bind('cloudflare.connection', function (Container $app) {
			return $app['cloudflare']->connection();
		});

	}
	public function provides()
    {
        return [
            'cloudflare.adapter',
            'cloudflare.factory',
            'cloudflare',
            'cloudflare.connection',
        ];
    }
}
?>
