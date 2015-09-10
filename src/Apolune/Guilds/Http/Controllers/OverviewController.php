<?php

namespace Apolune\Guilds\Http\Controllers;

use Apolune\Core\Http\Controllers\Controller;
use Apolune\Guilds\Http\Requests\Overview\SelectRequest;

class OverviewController extends Controller
{
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

        list($guilds, $forming) = $this->getGuilds($world);

        return view('theme::guilds.overview.show', compact('world', 'guilds', 'forming'));
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

        $found = $guilds->filter(function ($guild) {
            return ! $guild->isForming();
        });

        $forming = $guilds->filter(function ($guild) {
            return $guild->isForming();
        });

        return [$found, $forming];
    }
}
