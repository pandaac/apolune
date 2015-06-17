<?php

namespace Apolune\Library\Http\Controllers;

use Apolune\Core\Http\Controllers\Controller;

class ExperienceController extends Controller
{
    /**
     * Show the experience table.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme::library.experience');
    }
}
