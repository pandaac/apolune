<?php

namespace Apolune\Guilds\Http\Controllers;

use Apolune\Contracts\Server\World;
use Illuminate\Database\Eloquent\Collection;
use Apolune\Core\Http\Controllers\Controller;
use Apolune\Guilds\Http\Requests\Overview\SelectRequest;
use Apolune\Guilds\Http\Requests\Overview\CreateRequest;

class OverviewController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('world.exists:/guilds', [
            'only' => ['show'],
        ]);

        $this->middleware('auth', [
            'only' => ['create', 'store'],
        ]);
    }

    /**
     * Display a list of all available worlds.
     *
     * @return \Illuminate\View\View
     */
    public function form()
    {
        if ($worlds = worlds() and $worlds->count() <= 1)
        {
            return $this->show();
        }

        return view('theme::guilds.overview.form', compact('worlds'));
    }

    /**
     * Select a specific world.
     *
     * @param  \Apolune\Guilds\Http\Requests\Overview\SelectRequest  $request
     * @return \Illuminate\Http\Redirect
     */
    public function select(SelectRequest $request)
    {
        $request->flash();

        return redirect(url('/guilds', $request->get('world')));
    }

    /**
     * Display the create guild form.
     *
     * @param  string  $world  null
     * @return \Illuminate\View\View
     */
    public function create($world = null)
    {
        if ($worlds = worlds() and $worlds->count() > 1 and ! $world) {
            return redirect('/guilds');
        }

        return view('theme::guilds.overview.create', compact('world', 'worlds'));
    }

    /**
     * Create the new guild.
     *
     * @param  \Apolune\Guilds\Http\Requests\Overview\CreateRequest  $request
     * @return \Illuminate\Http\Request
     */
    public function store(CreateRequest $request)
    {
        return redirect(url('/guilds', $request->get('world')));
    }

    /**
     * Display all the available guilds.
     *
     * @param  \Apolune\Contracts\Server\World  $world  null
     * @return \Illuminate\View\View
     */
    public function show($world = null)
    {
        list($guilds, $forming) = $this->getGuildsByFormationState($world);

        return view('theme::guilds.overview.show', compact('world', 'guilds', 'forming'));
    }

    /**
     * Retrieve both formed and forming guilds from a specific world.
     *
     * @param  \Apolune\Contracts\Server\World  $world  null
     * @return array
     */
    protected function getGuildsByFormationState(World $world = null)
    {
        $guilds = app('guild')->fromWorld($world)->get();
        $guilds->load('properties', 'ranks.players');

        return [
            $this->getFormedGuilds($guilds),
            $this->getFormingGuilds($guilds),
        ];
    }

    /**
     * Retrieve all the formed guilds.
     *
     * @param  \Illuminate\Database\Eloquent\Collection  $guilds
     * @return array
     */
    protected function getFormedGuilds(Collection $guilds)
    {
        return $guilds->filter(function ($guild) {
            return ! $guild->isForming();
        });
    }

    /**
     * Retrieve all the forming guilds.
     *
     * @param  \Illuminate\Database\Eloquent\Collection  $guilds
     * @return array
     */
    protected function getFormingGuilds(Collection $guilds)
    {
        return $guilds->filter(function ($guild) {
            return $guild->isForming();
        });
    }
}
