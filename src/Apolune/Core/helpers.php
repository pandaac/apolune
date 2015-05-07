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
