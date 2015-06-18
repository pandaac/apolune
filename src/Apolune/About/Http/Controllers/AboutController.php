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

    /**
     * Show the game features page.
     *
     * @return \Illuminate\Http\Response
     */
    public function features()
    {
        return view('theme::about.features');
    }

    /**
     * Show the premium features page.
     *
     * @return \Illuminate\Http\Response
     */
    public function premium()
    {
        return view('theme::about.premium');
    }
}
