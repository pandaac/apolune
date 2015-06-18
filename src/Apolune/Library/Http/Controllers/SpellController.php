<?php

namespace Apolune\Library\Http\Controllers;

use Apolune\Core\Http\Controllers\Controller;

class SpellController extends Controller
{
    /**
     * Show the spells.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme::library.spells');
    }
}
