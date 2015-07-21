<?php

namespace Apolune\Core\Database\Migrations;

use Illuminate\Support\Str;
use Illuminate\Database\Migrations\Migrator as BaseMigrator;

class Migrator extends BaseMigrator
{
    /**
     * Get all of the migration files in a given path.
     *
     * @param  string  $path
     * @return array
     */
    public function getMigrationFiles($path)
    {
        $files = collect()->push([null, $this->files->glob($path.'/*_*.php')]);

        $this->locations()->each(function ($location) use (&$files) {
            list($path, $namespace) = $location;

            $files->push([$namespace, $this->files->glob($path.'/*_*.php')]);
        });

        // Once we have all of the files gathered in a multi dimensional array, we loop
        // through them and re-format their names to include an optional namespace,
        // and we strip the file down to its basename (excluding the extension).
        $files = $files->map(function ($group) {
            list($namespace, $files) = $group;

            return array_map(function ($file) use ($namespace) {
                return ($namespace ? $namespace.'\\' : null).str_replace('.php', null, basename($file)); }
            , $files);
        });

        $files = $files->flatten()->toArray();

        // Once we have all of the formatted file names we will sort them and since
        // they all start with a timestamp this should give us the migrations in
        // the order they were actually created by the application developers.
        sort($files);

        return $files;
    }

    /**
     * Require in all the migration files in a given path.
     *
     * @param  string  $path
     * @param  array   $files
     * @return void
     */
    public function requireFiles($path, array $files)
    {
        $locations = $this->locations()->push([$path, null]);

        $locations->each(function ($location) use ($files) {
            $path = head($location);
        
            foreach ($files as $file) {
                $file = head($this->parseFileName($file));

                if ($this->files->isFile($path.'/'.$file.'.php')) {
                    $this->files->requireOnce($path.'/'.$file.'.php');
                }
            }
        });
    }

    /**
     * Resolve a migration instance from a file.
     *
     * @param  string  $file
     * @return object
     */
    public function resolve($file)
    {
        list($file, $namespace) = $this->parseFileName($file);

        $class = sprintf('%s%s', $namespace, Str::studly(implode('_', array_slice(explode('_', $file), 4))));

        if (! class_exists($class)) {
            $this->requireFiles(null, [$file]);
        }
        
        return new $class;
    }

    /**
     * Parse a file name.
     *
     * @param  string  $file
     * @return array
     */
    protected function parseFileName($file)
    {
        $delimiter = strrpos($file, '\\');

        if ($delimiter !== false) {
            return [
                trim(substr($file, $delimiter), '\\'),
                trim(substr($file, 0, $delimiter), '\\').'\\',
            ];
        }

        return [$file, null];
    }

    /**
     * Retrieve the migration locations.
     *
     * @return \Illuminate\Support\Collection
     */
    protected function locations()
    {
        return app('migration.handler')->locations();
    }
}
