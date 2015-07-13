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
        $files = $this->files->glob($path.'/*_*.php');

        $locations = app('migration.handler')->locations();

        foreach ($locations as $location) {
            $files = array_merge($files, $this->files->glob($location.'/*_*.php'));
        }

        // Once we have the array of files in the directory we will just remove the
        // extension and take the basename of the file which is all we need when
        // finding the migrations that haven't been run against the databases.
        if ($files === false) {
            return [];
        }

        $files = array_map(function ($file) {
            return str_replace('.php', '', basename($file));

        }, $files);

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
        $class = Str::studly(implode('_', array_slice(explode('_', $file), 4)));

        if (class_exists($class)) {
            return new $class;
        }

        $locations = app('migration.handler')->locations();

        foreach ($locations as $location) {
            $this->files->requireOnce($location.'/'.$file.'.php');

            if (class_exists($class)) {
                return new $class;
            }
        }
    }
}
