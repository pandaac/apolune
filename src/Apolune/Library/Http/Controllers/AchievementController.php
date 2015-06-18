<?php

namespace Apolune\Library\Http\Controllers;

use Apolune\Core\Http\Controllers\Controller;

class AchievementController extends Controller
{
    /**
     * Show the achievements.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme::library.achievements');
    }
}
