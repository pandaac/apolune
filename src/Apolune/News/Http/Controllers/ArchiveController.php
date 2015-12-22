<?php

namespace Apolune\News\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Apolune\News\Http\Requests\SearchRequest;
use Apolune\Core\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidationException;

class ArchiveController extends Controller
{
    /**
     * Show the news archive form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function form(Request $request)
    {
        $year = $this->getFirstYear();

        return view('theme::news.archive.form', compact('year'));
    }

    /**
     * Display all the search results.
     *
     * @param  \Apolune\News\Http\Requests\SearchRequest  $request
     * @return \Illuminate\View\View
     */
    public function results(SearchRequest $request)
    {
        $request->flash();

        list($from, $to) = $this->getDates($request);

        if ($to->diffInDays($from, false) > 0) {
            throw new ValidationException($request->response([
                'date' => trans('theme::news/archive/results.date'),
            ]));
        }

        list($results, $year) = [
            $this->getResults($request, $from, $to),
            $this->getFirstYear(),
        ];

        return view('theme::news/archive/results', compact('results', 'year'));
    }

    /**
     * Show a single newsitem.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $article = app('news')->where('slug', $slug)->firstOrFail();

        return view('theme::news/archive/show', compact('article'));
    }

    /**
     * Retrieve the full from & to dates.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function getDates(Request $request)
    {
        $from = Carbon::createFromDate(
            $request->get('from_year'), $request->get('from_month'), $request->get('from_day')
        );

        $to = Carbon::createFromDate(
            $request->get('to_year'), $request->get('to_month'), $request->get('to_day')
        );

        return [$from, $to];
    }

    /**
     * Retrieve all of the newsitems.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Carbon\Carbon  $from  null
     * @param  \Carbon\Carbon  $to  null
     * @return \Apolune\Contracts\News\History
     */
    protected function getResults(Request $request, Carbon $from, Carbon $to)
    {
        $history = app('news')
            ->where('created_at', '>=', $from->format('Y-m-d 00:00:00'))
            ->where('created_at', '<=', $to->format('Y-m-d 00:00:00'));

        if ($request->has('type')) {
            $history = $history->whereIn('type', $request->get('type'));
        }

        if ($request->has('icon')) {
            $history = $history->whereIn('icon', $request->get('icon'));
        }
        
        return $history->orderBy('created_at', 'DESC')->get();
    }

    /**
     * Retrieve the year of the first ever article.
     *
     * @return integer
     */
    protected function getFirstYear()
    {
        $first = app('news')->orderBy('created_at', 'ASC')->first();

        return $first ? $first->creation()->format('Y') : date('Y');
    }
}
