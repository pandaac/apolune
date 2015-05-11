<?php

if ( ! function_exists('account'))
{
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

if ( ! function_exists('gender'))
{
	/**
	 * Get a specific gender.
	 *
	 * @return \Apolune\Contracts\Server\Gender
	 */
	function gender($id)
	{
		$genders = genders();

		return head(array_where($genders, function($key, $gender) use ($id)
		{
			return $gender->id() === $id;
		}));
	}
}

if ( ! function_exists('genders'))
{
	/**
	 * Get all of the server genders.
	 *
	 * @return \Illuminate\Support\Collection
	 */
	function genders()
	{
		$factory = app()->make('Apolune\Contracts\Server\Factory');

		return $factory->genders();
	}
}

if ( ! function_exists('hyphencase'))
{
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

if ( ! function_exists('theme_path'))
{
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

if ( ! function_exists('vocation'))
{
	/**
	 * Get a specific vocation.
	 *
	 * @return \Apolune\Contracts\Server\Vocation
	 */
	function vocation($id)
	{
		$vocations = vocations();

		return head(array_where($vocations, function($key, $vocation) use ($id)
		{
			return $vocation->id() === $id;
		}));
	}
}

if ( ! function_exists('vocations'))
{
	/**
	 * Get all of the server vocations.
	 *
	 * @param  boolean  $starter  null
	 * @return \Illuminate\Support\Collection
	 */
	function vocations($starter = null)
	{
		$factory = app()->make('Apolune\Contracts\Server\Factory');

		return $factory->vocations($starter);
	}
}

if ( ! function_exists('world'))
{
	/**
	 * Get a specific world.
	 *
	 * @return \Apolune\Contracts\Server\World
	 */
	function world($id)
	{
		$worlds = worlds();

		return head(array_where($worlds, function($key, $world) use ($id)
		{
			return $world->id() === $id;
		}));
	}
}

if ( ! function_exists('worlds'))
{
	/**
	 * Get all of the server worlds.
	 *
	 * @return \Illuminate\Support\Collection
	 */
	function worlds()
	{
		$factory = app()->make('Apolune\Contracts\Server\Factory');

		return $factory->worlds();
	}
}
