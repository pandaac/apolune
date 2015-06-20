<?php

namespace Apolune\News\Http\Controllers;

use Apolune\Core\Http\Controllers\Controller;

class ArchiveController extends Controller
{
    /**
     * Show the news archive page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme::news.archive');
    }
}
