<?php

namespace Apolune\Profile\Http\Controllers;

use Apolune\Contracts\Account\Player;
use Apolune\Core\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Show the search for character profile page.
     *
     * @param  \Apolune\Contracts\Account\Player  $player
     * @return \Illuminate\View\View
     */
    public function show(Player $player)
    {
        $player->load([
            'properties',
            'account',
            'account.players.properties' => function ($query) { $query->where('hide', 0); },
            'account.players',
        ]);

        return view('theme::profile.show', compact('player'));
    }
}
