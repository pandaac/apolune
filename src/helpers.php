<?php

if ( ! function_exists('apolune_path'))
{
	/**
	 * Retrieve the Apolune package path.
	 *
	 * @param  string  $path  null
	 * @return string
	 */
	function apolune_path($path = null)
	{
		return __DIR__.'/Apolune/'.($path ? '/'.$path : $path);
	}
}
