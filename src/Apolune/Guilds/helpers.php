<?php

if (! function_exists('guild_by_slug')) {
    /**
     * Get a specific guild by its slug.
     *
     * @param  string  $slug
     * @return \Apolune\Contracts\Guilds\Guild
     */
    function guild_by_slug($slug)
    {
        $name = str_replace('-', ' ', $slug);

        return app('guild')->where('name', $name)->first();
    }
}
