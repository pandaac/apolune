<?php

namespace Apolune\Library\Http\Controllers;

use Illuminate\Http\Request;
use Apolune\Core\Http\Controllers\Controller;
use Apolune\Library\Http\Requests\Spells\FormRequest;

class SpellController extends Controller
{
    /**
     * Show the spells page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spells = session('spells', spells());

        return view('theme::library.spells.index', compact('spells'));
    }

    /**
     * Process the search criteria for the spells page.
     *
     * @param  \Apolune\Library\Http\Requests\Spells\FormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function form(FormRequest $request)
    {
        extract($this->getCriteria($request));

        $spells = spells();

        if (strtolower($vocation) !== 'all') {
            $spells = $spells->filter(function ($spell) use ($vocation) {
                $vocations = vocations(true)->filter(function ($vocation) use ($spell) {
                    return in_array($vocation->name(), $spell->vocations());
                })->map(function (&$item) {
                    $item = $item->id();
                })->keys();

                return in_array((int) $vocation, $vocations->toArray());
            });
        }

        if (strtolower($group) !== 'all') {
            $spells = $spells->filter(function ($spell) use ($group) {
                return strtolower($spell->group()) === strtolower($group);
            });
        }

        if (strtolower($type) !== 'all') {
            $spells = $spells->filter(function ($spell) use ($type) {
                return strtolower($spell->type()) === strtolower($type);
            });
        }

        if (strtolower($premium) !== 'all') {
            $spells = $spells->filter(function ($spell) use ($premium) {
                return $spell->premium() === (strtolower($premium) === 'yes');
            });
        }

        return redirect('/library/spells')->with('spells', $spells)->withInput();
    }

    /**
     * Retrieve the search criteria from the request object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function getCriteria(Request $request)
    {
        return $request->only('vocation', 'group', 'type', 'premium', 'sort');
    }
}
