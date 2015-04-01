<?php namespace Apolune\Core\Providers;

use Apolune\Core\Contracts\Theme;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

abstract class ThemeServiceProvider extends BaseServiceProvider implements Theme {

	/**
	 * Holds all the registered paths.
	 *
	 * @var array
	 */
	protected static $paths = [];

	/**
	 * Register a view file namespace.
	 *
	 * @param  string  $path
	 * @param  string  $namespace  null
	 * @return void
	 */
	protected function loadViewsFrom($path, $namspace = null)
	{
		static::$paths['views'][$this->namespace] = $path;

		/*if (is_dir($appPath = $this->app->basePath().'/themes/'.$this->theme.'/packages/'.$this->namespace.'/views'))
		{
			$this->app['view']->addNamespace($this->namespace, $appPath);
		}*/

		$this->app['view']->addNamespace('theme', $path);

		$this->app['view']->addNamespace($this->namespace, $path);
	}

	/**
	 * Register a translation file namespace.
	 *
	 * @param  string  $path
	 * @param  string  $namespace  null
	 * @return void
	 */
	protected function loadTranslationsFrom($path, $namspace = null)
	{
		static::$paths['translations'][$this->namespace] = $path;

		/*if (is_dir($appPath = $this->app->basePath().'/themes/'.$this->theme.'/packages/'.$this->namespace.'/lang'))
		{
			return $this->app['translator']->addNamespace($this->namespace, $appPath);
		}*/
		
		$this->app['translator']->addNamespace('theme', $path);

		$this->app['translator']->addNamespace($this->namespace, $path);
	}

	/**
	 * Register a package override file namespace.
	 *
	 * @param  string  $path
	 * @param  string  $namespace  null
	 * @return void
	 */
	protected function loadOverridesFrom($path, $namspace = null)
	{

	}

	/**
	 * Get all the registered paths of a specific group.
	 *
	 * @param  string  $type
	 * @return array
	 */
	public static function getPaths($type)
	{
		if ( ! isset(static::$paths[$type]))
		{
			return [];
		}

		return (array) static::$paths[$type];
	}

}
