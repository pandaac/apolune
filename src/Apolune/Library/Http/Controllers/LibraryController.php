<?php

namespace Apolune\Library\Http\Controllers;

use Apolune\Core\Http\Controllers\Controller;

class LibraryController extends Controller
{
    /**
     * Show the creatures page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreatures()
    {
        $creatures = creatures();
  
        return view('theme::library.creatures')->withCreatures($creatures);
    }

    /**
     * Show all the maps page
     *
     * @return \Illuminate\Http\Response
     */
    public function getMaps()
    {
        return view('theme::library.maps.all');
    }
}
