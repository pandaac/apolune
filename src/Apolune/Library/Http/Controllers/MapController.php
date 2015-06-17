<?php

namespace Apolune\Library\Http\Controllers;

use Apolune\Core\Http\Controllers\Controller;

class MapController extends Controller
{
    /**
     * Display all the available maps.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme::library.maps.index');
    }

    /**
     * Show a specific map page.
     *
     * @param  string  $area
     * @return \Illuminate\Http\Response
     */
    public function show($area)
    {
        $area = str_replace([' ', '-', '_'], null, strtolower($area));

        if ( ! app('view')->exists($path = "theme::library.maps.${area}"))
        {
            return redirect('/library/maps');
        }

        return view($path, compact('area'));
    }
}
