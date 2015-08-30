<?php

namespace Apolune\Account\Http\Controllers\Player;

use Illuminate\Contracts\Auth\Guard;
use Apolune\Core\Http\Controllers\Controller;
use Apolune\Account\Http\Requests\Player\CreateRequest;

class CreateController extends Controller
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

        $this->middleware('auth');
    }

    /**
     * Show the creation form.
     *
     * @return \Illuminate\View\View
     */
    public function form()
    {
        return view('theme::account.player.create.form');
    }

    /**
     * Confirm the new character.
     * 
     * @param  \Apolune\Account\Http\Requests\Player\CreateRequest  $request
     * @return \Illuminate\View\View
     */
    public function confirm(CreateRequest $request)
    {
        $request->flash();

        return view('theme::account.player.create.confirm');
    }

    /**
     * Create the new character.
     *
     * @param  \Apolune\Account\Http\Requests\Player\CreateRequest  $request
     * @return \Illuminate\View\View|\Illuminate\Http\Response
     */
    public function create(CreateRequest $request)
    {
        if ($request->get('back') === "") {
            return redirect('/account/character')->withInput($request->all());
        }

        $player = $this->auth->user()->players()->create([
            'name'          => $request->get('player'),
            'account_id'    => $this->auth->id(),
            'vocation'      => $request->get('vocation', vocations(true)->first()->id()),
            'town_id'       => $request->get('town', towns(true)->first()->id()),
            'sex'           => $request->get('sex', genders()->first()->id()),
            'world_id'      => $request->get('world', worlds()->first()->id()),
            'conditions'    => '',
        ]);

        return view('theme::account.player.create.created', compact('player'));
    }
}