<?php

namespace Apolune\Library\Http\Controllers;

use Apolune\Core\Http\Controllers\Controller;

class CreatureController extends Controller
{
    /**
     * Show the creatures page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creatures = creatures();
  
        return view('theme::library.creatures.index', compact('creatures'));
    }
}
