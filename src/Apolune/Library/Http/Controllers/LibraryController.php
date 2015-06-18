<?php

namespace Apolune\Library\Http\Controllers;

use Apolune\Core\Http\Controllers\Controller;

class LibraryController extends Controller
{
    /**
     * Show the experience table.
     *
     * @return \Illuminate\Http\Response
     */
    public function experience()
    {
        return view('theme::library.experience');
    }

    /**
     * Show the genesis.
     *
     * @return \Illuminate\Http\Response
     */
    public function genesis()
    {
        return view('theme::library.genesis');
    }
}
