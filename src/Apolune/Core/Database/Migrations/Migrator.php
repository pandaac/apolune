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
        $files = array_map(function ($file) {
            return str_replace('.php', '', basename($file));
        }, $this->files->glob($path.'/*_*.php'));

        $locations = app('migration.handler')->locations();

        foreach ($locations as $location) {
            list($directory, $namespace) = $location;

            $migrations = $this->files->glob($directory.'/*_*.php');
            
            array_walk($migrations, function (&$migration) use ($namespace) {
                $migration = $namespace.'\\'.str_replace('.php', '', basename($migration));
            });

            $files = array_merge($files, $migrations);
        }

        // Once we have the array of files in the directory we will just remove the
        // extension and take the basename of the file which is all we need when
        // finding the migrations that haven't been run against the databases.
        if ($files === false) {
            return [];
        }

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
        foreach ($files as $file) {
            if ($this->files->isFile($path.'/'.$file.'.php')) {
                $this->files->requireOnce($path.'/'.$file.'.php');
            }
        }
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

        $class = $namespace.Str::studly(implode('_', array_slice(explode('_', $file), 4)));

        if (class_exists($class)) {
            return new $class;
        }

        $locations = app('migration.handler')->locations();

        foreach ($locations as $location) {
            list($migration, $namespace) = $location;

            $this->files->requireOnce($migration.'/'.$file.'.php');

            if (class_exists($class)) {
                return new $class;
            }
        }
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
}
