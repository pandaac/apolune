<?php

namespace Apolune\Library\Http\Controllers;

use Apolune\Core\Http\Controllers\Controller;

class LibraryController extends Controller
{

    /**
     * Show the creatures page
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreatures()
    {
        return view('theme::library.creatures');
    }
}
