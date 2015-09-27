<?php

namespace Apolune\Guilds\Http\Controllers;

use Apolune\Contracts\Server\World;
use Apolune\Core\Http\Controllers\Controller;

class GuildController extends Controller
{
    /**
     * Display a specific guild.
     *
     * @param  \Apolune\Contracts\Server\World  $world  null
     * @param  string  $guild  null
     * @return \Illuminate\View\View
     */
    public function show($world = null, $guild = null)
    {
        list($guild, $world, $sort, $order) = $this->resolveParameters($world, $guild);

        if (! $guild) {
            return redirect(url('/guilds', ($world ? $world->slug() : null)));
        }

        $guild->load('properties', 'ranks.players.playerOnline');

        return view('theme::guilds.guild.show', compact('guild', 'world', 'sort', 'order'));
    }

    /**
     * Resolve the parameters.
     *
     * @param  \Apolune\Contracts\Server\World  $worldSlug  null
     * @param  string  $guildSlug  null
     * @return array
     */
    protected function resolveParameters($worldSlug, $guildSlug)
    {
        return [
            guild_by_slug($guildSlug ?: $worldSlug), 
            $guildSlug ? $worldSlug : null,
            'rank',
            'DESC',
        ];
    }
}
