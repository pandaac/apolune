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
    	$creatures = app()->make('Apolune\Contracts\Server\Factory')->creatures();
  
        return view('theme::library.creatures')->withCreatures($creatures);
    }
}
