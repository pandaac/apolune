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
        $newsitems = app('news')->tickers(5)->articles(1)->newsitems(5)->orderBy('created_at', 'DESC')->get();

        list($tickers, $news, $articles) = $newsitems->groupBy('type')->sortByDesc('type')->values();

        return view('theme::news.latest.overview', compact('tickers', 'articles', 'news'));
    }

    /**
     * Show a single article.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $article = app('news')->article()->where('slug', $slug)->firstOrFail();

        return view('theme::news.latest.show', compact('article'));
    }
}
