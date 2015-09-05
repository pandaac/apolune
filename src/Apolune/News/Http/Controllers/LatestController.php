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
    public function overview()
    {
        $tickers = app('news.ticker')->take(5)->orderBy('created_at', 'DESC')->get();

        $article = app('news.article')->orderBy('created_at', 'DESC')->first();

        $news = app('news')->take(4)->orderBy('created_at', 'DESC')->get();

        return view('theme::news.latest.overview', compact('tickers', 'article', 'news'));
    }

    /**
     * Show a single newsitem.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $article = app('news.article')->where('slug', $slug)->firstOrFail();

        return view('theme::news.latest.show', compact('article'));
    }
}
