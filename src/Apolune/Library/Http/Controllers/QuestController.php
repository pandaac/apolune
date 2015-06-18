<?php

namespace Apolune\Library\Http\Controllers;

use Apolune\Core\Http\Controllers\Controller;

class QuestController extends Controller
{
    /**
     * Show the quests.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme::library.quests');
    }
}
