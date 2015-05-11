<?php namespace Apolune\Core\Providers;

use Exception;

use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider {

	/**
	 * The Artisan commands provided by your application.
	 *
	 * @var array
	 */
	protected $commands = [];

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		if (env('APP_HTTPS'))
		{
			$this->app['url']->forceSchema('https');
		}

		$this->registerTheme(
			config('pandaac.theme')
		);
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->register('Apolune\Core\Providers\RouteServiceProvider');

		$this->registerProviders(
			config('pandaac.providers', [])
		);

		$this->registerCommands($this->commands);
	}

	/**
	 * Register any additional application providers.
	 *
	 * @param  array $providers
	 * @return void
	 */
	private function registerProviders(array $providers)
	{
		foreach ($providers as $provider)
		{
			$this->app->register($provider);
		}
	}

	/**
	 * Register the active theme.
	 *
	 * @param  string  $theme
	 * @return void
	 */
	private function registerTheme($theme)
	{
		$provider = $this->app->register($theme);

		if ( ! property_exists($provider, 'namespace'))
		{
			throw new Exception('Theme Service Provider must declare a namespace property.');
		}
	}

	/**
	 * Register all the package specific console commands.
	 *
	 * @param  array  $commands
	 * @return void
	 */
	private function registerCommands(array $commands)
	{
		foreach ($commands as $name => $command)
		{
			$this->app->singleton("command.pandaac.${name}", function($app) use($command)
			{
				return $app[$command];
			});

			$this->commands("command.pandaac.${name}");
		}
	}

}
