<?php

if (! function_exists('guild_by_slug')) {
    /**
     * Get a specific guild by its slug.
     *
     * @param  string  $slug
     * @param  \Apolune\Contracts\Server\World  $world  null
     * @return \Apolune\Contracts\Guilds\Guild
     */
    function guild_by_slug($slug, $world = null)
    {
        $name = str_replace('-', ' ', $slug);

        return app('guild')->fromWorld($world)->where('name', $name)->first();
    }
}
