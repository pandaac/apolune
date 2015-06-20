<?php

namespace Apolune\News\Http\Controllers;

use Apolune\Core\Http\Controllers\Controller;

class LatestController extends Controller
{
    /**
     * Show the news page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme::news.latest');
    }
}
