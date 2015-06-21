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
     * @param  integer  $page  1
     * @return \Illuminate\Http\Response
     */
    public function genesis($page = 1)
    {
        $page = (int) $page;

        if ( ! app('view')->exists($path = "theme::library.genesis.${page}"))
        {
            return redirect('/library/genesis');
        }

        return view($path);
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
