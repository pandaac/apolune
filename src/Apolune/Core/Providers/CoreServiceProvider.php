<?php namespace Apolune\Core\Providers;

use Exception;
use Apolune\Core\Providers\ThemeServiceProvider;

use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider {

	/**
	 * The Artisan commands provided by your application.
	 *
	 * @var array
	 */
	protected $commands = [
		'package.publish' => 'Apolune\Core\Console\Commands\PackagePublisher',
	];

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->registerTheme(
			config('pandaac.theme', 'pandaac\ThemeTibia\ServiceProvider')
		);
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
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

		if ( ! ($provider instanceof ThemeServiceProvider))
		{
			throw new Exception('Theme Service Provider is not an instance of \Apolune\Core\Providers\ThemeServiceProvider');
		}

		if ( ! property_exists($provider, 'namespace'))
		{
			throw new Exception('Theme Service Provider must declare a namespace property.');
		}

		$this->app->bind('Apolune\Core\Contracts\Theme', $provider);
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
