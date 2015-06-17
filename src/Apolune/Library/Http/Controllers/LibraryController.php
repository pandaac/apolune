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
     * Show all the maps page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMaps()
    {
        return view('theme::library.maps');
    }

    /**
     * Show a specific map page.
     *
     * @param  string  $area
     * @return \Illuminate\Http\Response
     */
    public function getMap($area)
    {
        $area = str_replace([' ', '-', '_'], null, strtolower($area));

        if ( ! app('view')->exists($path = "theme::library.map.${area}"))
        {
            return redirect('/library/maps');
        }

        return view($path, compact('area'));
    }
}
