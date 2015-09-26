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

        if (! $guild) {
            return redirect(url('/guilds', ($world ? $world->slug() : null)));
        }

        list($sort, $order) = ['rank', 'DESC'];

        return view('theme::guilds.guild.show', compact('guild', 'world', 'sort', 'order'));
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

        $world = world_by_slug($world);
        $guild = guild_by_slug($guild, $world);

        if ($guild) {
            $guild->load('properties', 'players', 'ranks');
            $guild->players->load('guild', 'guildrank');
            $guild->ranks->load('members.playerOnline');
        }

        return [$guild, $world];
    }
}
