<?php

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Debug\Dumper;

if (! function_exists('account')) {
    /**
     * Return the currently authenticated user.
     *
     * @return \Apolune\Contracts\Account\Account
     */
    function account()
    {
        return Auth::user();
    }
}

if (! function_exists('countries')) {
    /**
     * Get all of the countries.
     *
     * @return \Illuminate\Support\Collection
     */
    function countries()
    {
        return server()->countries();
    }
}

if (! function_exists('country')) {
    /**
     * Get a specific country.
     *
     * @param  string  $code
     * @return string
     */
    function country($code)
    {
        $countries = countries();

        return head(array_where($countries, function ($key, $country) use ($code) {
            return strtoupper($key) === strtoupper($code);
        }));
    }
}

if (! function_exists('creatures')) {
    /**
     * Get all of the creatures.
     *
     * @return \Illuminate\Support\Collection
     */
    function creatures()
    {
        return server()->creatures();
    }
}

if (! function_exists('d')) {
    /**
     * Dump the passed variables.
     *
     * @param  mixed
     * @return void
     */
    function d()
    {
        array_map(function ($x) {
            (new Dumper)->dump($x);
        }, func_get_args());
    }
}

if (! function_exists('experience')) {
    /**
     * Calculate the experience needed for a specific level.
     *
     * @param  integer  $level
     * @return \Illuminate\Support\Collection
     */
    function experience($level)
    {
        $formula = config('pandaac.apolune.core.formula-experience');

        return $formula($level);
    }
}

if (! function_exists('gender')) {
    /**
     * Get a specific gender.
     *
     * @param  integer  $id
     * @return \Apolune\Contracts\Server\Gender
     */
    function gender($id)
    {
        $genders = genders();

        return head(array_where($genders, function ($key, $gender) use ($id) {
            return $gender->id() === (int) $id;
        }));
    }
}

if (! function_exists('genders')) {
    /**
     * Get all of the server genders.
     *
     * @return \Illuminate\Support\Collection
     */
    function genders()
    {
        return server()->genders();
    }
}

if (! function_exists('hyphencase')) {
    /**
     * Convert a string to all lowercase with hyphens instead of spaces.
     *
     * @param  string  $string
     * @return string
     */
    function hyphencase($string)
    {
        return strtolower(str_replace([' ', '_'], '-', $string));
    }
}

if (! function_exists('limit')) {
    /**
     * Limit the number of characters in a string.
     *
     * @param  string  $value
     * @param  integer  $limit  100
     * @param  string  $end  ..
     * @return string
     */
    function limit($value, $limit = 100, $end = '...')
    {
        return Str::limit($value, $limit, $end);
    }
}

if (! function_exists('month')) {
    /**
     * Return the human-readable format of a month.
     *
     * @param  integer  $month
     * @param  string  $format  F
     * @return string
     */
    function month($month, $format = 'F')
    {
        return (new Carbon)->month($month)->format($format);
    }
}

if (! function_exists('theme_path')) {
    /**
     * Get the path to the themes folder.
     *
     * @param  string  $path
     * @return string
     */
    function theme_path($path = '')
    {
        return base_path('/themes'.($path ? '/'.$path : $path));
    }
}

if (! function_exists('server')) {
    /**
     * Get the server factory.
     *
     * @return \Apolune\Contracts\Server\Factory
     */
    function server()
    {
        return app('server');
    }
}

if (! function_exists('town')) {
    /**
     * Get a specific town.
     *
     * @param  integer  $id
     * @param  boolean  $starter  null
     * @return \Apolune\Contracts\Server\Town
     */
    function town($id, $starter = null)
    {
        $towns = towns($starter);

        return head(array_where($towns, function ($key, $town) use ($id) {
            return $town->id() === (int) $id;
        }));
    }
}

if (! function_exists('towns')) {
    /**
     * Get all of the server towns.
     *
     * @param  boolean  $starter  null
     * @return \Illuminate\Support\Collection
     */
    function towns($starter = null)
    {
        return server()->towns($starter);
    }
}

if (! function_exists('vocation')) {
    /**
     * Get a specific vocation.
     *
     * @param  integer  $id
     * @param  boolean  $starter  null
     * @return \Apolune\Contracts\Server\Vocation
     */
    function vocation($id, $starter = null)
    {
        $vocations = vocations($starter);

        return head(array_where($vocations, function ($key, $vocation) use ($id) {
            return $vocation->id() === (int) $id;
        }));
    }
}

if (! function_exists('vocations')) {
    /**
     * Get all of the server vocations.
     *
     * @param  boolean  $starter  null
     * @return \Illuminate\Support\Collection
     */
    function vocations($starter = null)
    {
        return server()->vocations($starter);
    }
}

if (! function_exists('world')) {
    /**
     * Get a specific world.
     *
     * @param  integer  $id
     * @return \Apolune\Contracts\Server\World
     */
    function world($id)
    {
        $worlds = worlds();

        return head(array_where($worlds, function ($key, $world) use ($id) {
            return $world->id() === (int) $id;
        }));
    }
}

if (! function_exists('world_by_slug')) {
    /**
     * Get a specific world by its slug.
     *
     * @param  string  $slug
     * @return \Apolune\Contracts\Server\World
     */
    function world_by_slug($slug)
    {
        $worlds = worlds();

        return head(array_where($worlds, function ($key, $world) use ($slug) {
            return strtolower($world->slug()) === strtolower($slug);
        }));
    }
}

if (! function_exists('worlds')) {
    /**
     * Get all of the server worlds.
     *
     * @return \Illuminate\Support\Collection
     */
    function worlds()
    {
        return server()->worlds();
    }
}
