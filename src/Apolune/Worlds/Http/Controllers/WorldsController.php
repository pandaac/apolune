<?php

namespace Apolune\Worlds\Http\Controllers;

use Apolune\Core\Http\Controllers\Controller;
use Apolune\Worlds\Http\Requests\SelectRequest;

class WorldsController extends Controller
{
    /**
     * Holds the list of sortable columns.
     *
     * @var array
     */
    protected $sortables = ['name', 'level', 'vocation'];

    /**
     * Holds the list of sortable orders.
     *
     * @var array
     */
    protected $orders = ['asc', 'desc'];

    /**
     * Display a list of all available worlds.
     *
     * @return \Illuminate\View\View
     */
    public function overview()
    {
        $worlds = worlds();

        if ($worlds->count() <= 1)
        {
            return $this->show();
        }

        return view('theme::worlds.overview', compact('worlds'));
    }

    /**
     * Select a specific world.
     *
     * @param  \Apolune\Worlds\Http\Requests\SelectRequest  $request
     * @return \Illuminate\Http\Redirect
     */
    public function select(SelectRequest $request)
    {
        $request->flash();

        return redirect(url('/worlds', $request->get('world')));
    }

    /**
     * Display a specific world.
     *
     * @param  \Apolune\Contracts\Server\World  $world  null
     * @return \Illuminate\View\View
     */
    public function show($world = null)
    {
        $world = $world ?: worlds()->first();

        list($sort, $order) = $this->getSortable();

        $groups = app('player')->fromWorld($world)->online()->get()->sortBy(
            $sort, SORT_REGULAR, $order === 'DESC'
        )->groupBy(function ($player) {
            return strtoupper(substr($player->name(), 0, 1));
        });

        return view('theme::worlds.show', compact('world', 'sort', 'order', 'groups'));
    }

    /**
     * Get the sortable field and order.
     *
     * @return array
     */
    protected function getSortable()
    {
        $request = app('request');

        list($sort, $order) = array_map('strtolower', array_values($request->only('sort', 'order')));

        $sort = in_array($sort, $this->sortables) ? $sort : head($this->sortables);

        $order = in_array($order, $this->orders) ? $order : head($this->orders);

        return [$sort, strtoupper($order)];
    }
}
