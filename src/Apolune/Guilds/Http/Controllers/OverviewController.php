<?php

namespace Apolune\Guilds\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Apolune\Core\Http\Controllers\Controller;
use Apolune\Guilds\Http\Requests\Overview\SelectRequest;
use Apolune\Guilds\Http\Requests\Overview\CreateRequest;

class OverviewController extends Controller
{
    /**
     * The Guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;

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
        $worlds = worlds();

        if ($worlds->count() <= 1)
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
     * Display the guilds for a specific world.
     *
     * @param  string  $slug  null
     * @param  string  $sort  null
     * @return \Illuminate\View\View
     */
    public function show($slug = null, $sort = null)
    {
        $world = world_by_slug($slug);

        if (worlds()->count() > 1 and ! $world) {
            return redirect('/guilds');
        }

        list($guilds, $forming) = $this->getGuilds($world);

        return view('theme::guilds.overview.show', compact('world', 'guilds', 'forming'));
    }

    /**
     * Display the create guild form.
     *
     * @param  string  $slug  null
     * @return \Illuminate\View\View
     */
    public function create($slug = null)
    {   
        $world = world_by_slug($slug);

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
     * Get the guilds.
     *
     * @param  \Apolune\Contracts\Server\World  $world
     * @return array
     */
    protected function getGuilds($world)
    {
        $guilds = app('guild')->fromWorld($world)->orderBy('name', 'ASC')->get();
        $guilds->load('properties', 'players');

        $guilds->each(function ($guild) {
            $guild->players->load('guild', 'guildrank');
        });

        $found = $guilds->filter(function ($guild) {
            return ! $guild->isForming();
        });

        $forming = $guilds->filter(function ($guild) {
            return $guild->isForming();
        });

        return [$found, $forming];
    }
}
