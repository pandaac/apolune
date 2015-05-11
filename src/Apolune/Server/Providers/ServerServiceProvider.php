<?php namespace Apolune\Server\Providers;

use Apolune\Server\Factory;

use Illuminate\Support\ServiceProvider;

class ServerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$factory = new Factory($this->app, base_path('dummydata.json'));

		$this->app->instance('Apolune\Contracts\Server\Factory', $factory);

		$this->app->bind('Apolune\Contracts\Server\Gender', 'Apolune\Server\Services\Gender');
		$this->app->bind('Apolune\Contracts\Server\Vocation', 'Apolune\Server\Services\Vocation');
		$this->app->bind('Apolune\Contracts\Server\World', 'Apolune\Server\Services\World');
	}

}
