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
        $tickers = app('news.ticker')->all();
        $article = app('news.article')->first();
        $news    = app('news')->all();

        return view('theme::news.latest', compact('tickers', 'article', 'news'));
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
