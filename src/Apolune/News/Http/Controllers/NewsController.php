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
    public function getNews()
    {
        return view('theme::news.latest');
    }
}
