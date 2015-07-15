<?php

namespace Apolune\Core;

use ReflectionClass;

abstract class ThemeServiceProvider extends AggregateServiceProvider
{
    /**
     * The paths that should be published.
     *
     * @var array
     */
    protected $publish = [];

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        parent::register();

        $directory = $this->directory();

        foreach ($this->publish as $group => $paths) {
            $locations = [];

            array_walk($paths, function ($to, $from) use ($directory, &$locations) {
                $from = sprintf("%s/%s", $directory, $from);

                $locations[$from] = base_path($to);
            });

            $this->publishes($locations, $group);
        }
    }

    /**
     * Get the theme namespace.
     *
     * @return string
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * Register a view file namespace.
     *
     * @param  string  $path
     * @return void
     */
    protected function getViewsFrom($path)
    {
        $path = sprintf("%s/%s", $this->directory(), $path);

        return $this->loadViewsFrom(realpath($path), 'theme');
    }

    /**
     * Register a translation file namespace.
     *
     * @param  string  $path
     * @return void
     */
    protected function getTranslationsFrom($path)
    {
        $path = sprintf("%s/%s", $this->directory(), $path);

        return $this->loadTranslationsFrom(realpath($path), 'theme');
    }

    /**
     * Get the directory of the calling class.
     *
     * @return string
     */
    private function directory()
    {
        return dirname((new \ReflectionClass($this))->getFileName());
    }
}
