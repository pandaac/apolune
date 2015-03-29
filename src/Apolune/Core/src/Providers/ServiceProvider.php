<?php namespace Apolune\pandaac\Core\Providers;

use Illuminate\Support\ServiceProvider as BaseProvider;

abstract class ServiceProvider extends BaseProvider {

	/**
	 * Holds the name of the active theme.
	 *
	 * @var string
	 */
	protected $theme;

	/**
	 * Holds all the registered view paths.
	 *
	 * @var array
	 */
	protected static $views = [];

	/**
	 * Holds all the registered translation paths.
	 *
	 * @var array
	 */
	protected static $translations = [];

	/**
	 * Create a new service provider instance.
	 *
	 * @param  \Illuminate\Contracts\Foundation\Application  $app
	 * @return void
	 */
	public function __construct($app)
	{
		parent::__construct($app);

		$this->theme = hyphencase($app->config->get('pandaac.app.theme', 'default'));
	}

	/**
	 * Register a view file namespace.
	 *
	 * @param  string  $path
	 * @param  string  $namespace
	 * @return void
	 */
	protected function loadViewsFrom($path, $namespace)
	{
		static::$views[$namespace] = $path;

		if (is_dir($appPath = $this->app->basePath().'/themes/'.$this->theme.'/packages/'.$namespace.'/views'))
		{
			$this->app['view']->addNamespace($namespace, $appPath);
		}

		$this->app['view']->addNamespace($namespace, $path);
	}

	/**
	 * Register a translation file namespace.
	 *
	 * @param  string  $path
	 * @param  string  $namespace
	 * @return void
	 */
	protected function loadTranslationsFrom($path, $namespace)
	{
		static::$translations[$namespace] = $path;

		if (is_dir($appPath = $this->app->basePath().'/themes/'.$this->theme.'/packages/'.$namespace.'/lang'))
		{
			return $this->app['translator']->addNamespace($namespace, $appPath);
		}
		
		$this->app['translator']->addNamespace($namespace, $path);
	}

	public static function getViews()
	{
		return (array) static::$views;
	}

	public static function getTranslations()
	{
		return (array) static::$translations;
	}

}
