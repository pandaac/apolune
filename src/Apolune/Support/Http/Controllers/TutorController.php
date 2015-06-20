<?php

namespace Apolune\Support\Http\Controllers;

use Apolune\Core\Http\Controllers\Controller;

class TutorController extends Controller
{
    /**
     * Show the tutor guide page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme::support.tutor');
    }
}
