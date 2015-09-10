<?php

namespace Apolune\Guilds\Http\Controllers;

use Apolune\Core\Http\Controllers\Controller;

class GuildController extends Controller
{
    /**
     * Display a specific guild.
     *
     * @param  string  $world  null
     * @param  string  $guild  null
     * @return \Illuminate\View\View
     */
    public function show($world = null, $guild = null)
    {
        list($guild, $world) = $this->getGuild($world, $guild);

        dd($guild, $world);
    }

    /**
     * Retrieve the guild & possible world.
     *
     * @param  string  $world
     * @param  string  $guild
     * @return array
     */
    protected function getGuild($world, $guild)
    {
        if (is_null($guild)) {
            list($guild, $world) = [$world, null];
        }

        return [
            guild_by_slug($guild), 
            world_by_slug($world),
        ];
    }
}
