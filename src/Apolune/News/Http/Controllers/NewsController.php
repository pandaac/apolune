<?php

namespace Apolune\News\Http\Controllers;

use Apolune\Core\Http\Controllers\Controller;

class NewsController extends Controller
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

    /**
     * Show the news archive page.
     *
     * @return \Illuminate\Http\Response
     */
    public function archive()
    {
        return view('theme::news.archive');
    }
}
