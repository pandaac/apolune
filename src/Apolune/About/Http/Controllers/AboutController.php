<?php

namespace Apolune\About\Http\Controllers;

use Apolune\Core\Http\Controllers\Controller;

class AboutController extends Controller
{
    /**
     * Show the about server page.
     *
     * @return \Illuminate\Http\Response
     */
    public function server()
    {
        return view('theme::about.server');
    }
}
