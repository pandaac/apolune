<?php

namespace Apolune\Library\Http\Controllers;

use Apolune\Core\Http\Controllers\Controller;

class GenericController extends Controller
{
    /**
     * Show the achievements page.
     *
     * @return \Illuminate\Http\Response
     */
    public function achievements()
    {
        return view('theme::library.achievements');
    }

    /**
     * Show the experience table page.
     *
     * @return \Illuminate\Http\Response
     */
    public function experience()
    {
        return view('theme::library.experience');
    }

    /**
     * Show the genesis page.
     *
     * @return \Illuminate\Http\Response
     */
    public function genesis()
    {
        return view('theme::library.genesis');
    }

    /**
     * Show the quests page.
     *
     * @return \Illuminate\Http\Response
     */
    public function quests()
    {
        return view('theme::library.quests');
    }
}
