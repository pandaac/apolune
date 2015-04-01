<?php

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
