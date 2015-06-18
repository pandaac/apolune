<?php

namespace Apolune\About\Http\Controllers;

use Apolune\Core\Http\Controllers\Controller;

class ScreenshotController extends Controller
{
    /**
     * Show all of the screenshots.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme::about.screenshots');
    }
}
