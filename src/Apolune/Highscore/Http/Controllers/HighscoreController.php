<?php

namespace Apolune\Highscore\Http\Controllers;

use Apolune\Core\Http\Controllers\Controller;
use Apolune\Highscore\Http\Requests\SelectRequest;

class HighscoreController extends Controller
{
    /**
     * Holds the total players per page.
     *
     * @var integer
     */
    protected $limit = 25;

    /**
     * Holds the list of sortable columns.
     *
     * @var array
     */
    protected $sortables = [
        'experience'    => 'experience',
        'magic'         => 'maglevel',
        'shielding'     => ['skill_shielding', 'skill_shielding_tries'],
        'dist'          => ['skill_dist', 'skill_dist_tries'],
        'sword'         => ['skill_sword', 'skill_sword_tries'],
        'club'          => ['skill_club', 'skill_club_tries'],
        'axe'           => ['skill_axe', 'skill_axe_tries'],
        'fist'          => ['skill_fist', 'skill_fist_tries'],
        'fishing'       => ['skill_fishing', 'skill_fishing_tries'],
    ];

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

        return view('theme::highscore.form', compact('worlds'));
    }

    /**
     * Select a specific world.
     *
     * @param  \Apolune\Highscore\Http\Requests\SelectRequest  $request
     * @return \Illuminate\Http\Redirect
     */
    public function select(SelectRequest $request)
    {
        $request->flash();

        return redirect(url('/highscore', [$request->get('world'), $request->get('sort', null)]));
    }

    /**
     * Display the highscore for a specific world.
     *
     * @param  string  $slug  null
     * @param  string  $sort  null
     * @return \Illuminate\View\View
     */
    public function show($slug = null, $sort = null)
    {
        $world = world_by_slug($slug);
        $page  = (int) app('request')->get('page', 1);
        
        list($sort, $columns) = $this->getSortable($world ? $sort : $slug);

        $players = $this->getPlayers($world, $columns);

        if ($page > 1 and $page > $players->lastPage()) {
            return redirect(url('/highscore', [$world ? $world->slug() : null, $sort]));
        }

        return view('theme::highscore.show', compact('world', 'players', 'sort'));
    }

    /**
     * Get the players.
     *
     * @param  \Apolune\Contracts\Server\World  $world
     * @param  array  $columns
     * @return \Illuminate\Support\Collection
     */
    protected function getPlayers($world, $columns)
    {
        $players = app('player')->fromWorld($world);

        foreach ($columns as $column) {
            $players->orderBy($column, 'DESC');
        }

        return $players->orderBy('name', 'ASC')->paginate($this->limit);
    }

    /**
     * Get the sortable field and order.
     *
     * @param  string  $sort  null
     * @return string
     */
    protected function getSortable($sort = null)
    {
        $sort = strtolower($sort);

        $columns = isset($this->sortables[$sort]) ? $this->sortables[$sort] : head($this->sortables);

        $sort = isset($this->sortables[$sort]) ? $sort : key($this->sortables);

        return [$sort, (array) $columns];
    }
}
