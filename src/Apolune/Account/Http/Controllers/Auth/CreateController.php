<?php

namespace Apolune\Account\Http\Controllers\Auth;

use Illuminate\Contracts\Auth\Guard;
use Apolune\Core\Http\Controllers\Controller;
use Apolune\Account\Events\RequestVerificationEmail;
use Apolune\Account\Http\Requests\Auth\CreateRequest;

class CreateController extends Controller
{
    /**
     * The Guard implementation.
     *
     * @var Guard
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

        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function form()
    {
        return view('theme::account.auth.create');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Apolune\Account\Http\Requests\Account\CreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateRequest $request)
    {
        $account = app('account')->create([
            'name'      => $request->get('name'),
            'email'     => $request->get('email'),
            'password'  => bcrypt($request->get('password')),
            'creation'  => time(),
        ]);

        $account->properties->setEmailCode();

        $player = app('player')->create([
            'name'          => $request->get('player'),
            'account_id'    => $account->id(),
            'vocation'      => $request->get('vocation', vocations(true)->first()->id()),
            'town_id'       => $request->get('town', towns(true)->first()->id()),
            'world_id'      => $request->get('world', worlds()->first()->id()),
            'sex'           => $request->get('sex', genders()->first()->id()),
            'conditions'    => '',
        ]);

        $this->auth->login($account);

        event(new RequestVerificationEmail($account));

        return redirect('/account');
    }
}