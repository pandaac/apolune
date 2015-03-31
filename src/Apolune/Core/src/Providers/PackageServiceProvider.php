<?php namespace Apolune\Core\Providers;

use Exception;
use Apolune\Core\Contracts\Theme as ThemeContract;

use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider {

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
		$this->publishes([
			__DIR__.'/../../config/app.php' => config_path('pandaac/app.php'),
		]);

		$this->registerTheme(
			config('pandaac.app.theme', 'pandaac\Theme\ServiceProvider')
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
			config('pandaac.app.providers', [])
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
		$this->app->register($theme);

		$path = base_path("themes/${theme}");

		$this->app['view']->addNamespace('theme', "${path}/views");

		$this->app['translator']->addNamespace('theme', "${path}/lang");

		if ( ! is_file($providerPath = "${path}/ServiceProvider.php"))
		{
			throw new Exception("Missing Service Provider in theme <${theme}>.");
		}

		if ( ! ($namespace = $this->getNamespaceFromFile($providerPath)))
		{
			throw new Exception("Invalid namespace in Service Provider of theme <${theme}>.");
		}

		require_once $providerPath;

		$class = "${namespace}\ServiceProvider";

		if ( ! (($provider = new $class) instanceof ThemeContract))
		{
			throw new Exception("Service Provider in theme <${theme}> is not of type \Apolune\Core\Contracts\Theme.");
		}

		$provider->register();
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

	/**
	 * Get a PHP namespace from a file.
	 *
	 * @param  string  $file
	 * @return string
	 */
	private function getNamespaceFromFile($file)
	{
		$contents = file_get_contents($file);

		preg_match('/namespace\s+(.+?)\s?;/i', $contents, $matches);

		return isset($matches[1]) ? $matches[1] : null;
	}

}
