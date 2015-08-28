<?php

namespace Apolune\Worlds\Http\Controllers;

use Apolune\Core\Http\Controllers\Controller;

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
     * Display a specific world.
     *
     * @param  string  $slug  null
     * @return \Illuminate\View\View
     */
    public function show($slug = null)
    {
        $world = world_by_slug($slug) ?: worlds()->first();

        list($sort, $order) = $this->getSortable();

        $players = app('player')->online()->get()->sortBy(
            $sort, SORT_REGULAR, $order === 'DESC'
        );

        return view('theme::worlds.show', compact('world', 'sort', 'order', 'players'));
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
