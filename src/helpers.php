<?php

if (! function_exists('apolune_path')) {
    /**
     * Retrieve the Apolune package path.
     *
     * @param  string  $path  null
     * @return string
     */
    function apolune_path($path = null)
    {
        $path = ($path ? '/'.$path : $path);
        
        return realpath(sprintf("%s/Apolune/%s", __DIR__, $path));
    }
}
