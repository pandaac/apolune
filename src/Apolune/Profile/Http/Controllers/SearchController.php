<?php

namespace Apolune\Profile\Http\Controllers;

use Illuminate\Support\Str;
use Apolune\Core\Http\Controllers\Controller;
use Apolune\Profile\Http\Requests\SearchRequest;

class SearchController extends Controller
{
    /**
     * Show the search for character profile page.
     *
     * @return \Illuminate\View\View
     */
    public function form()
    {
        return view('theme::profile.search.form');
    }

    /**
     * Search for a character profile.
     *
     * @param  \Apolune\Profile\Http\Requests\SearchRequest  $request
     * @return \Illuminate\Http\Redirect
     */
    public function search(SearchRequest $request)
    {
        $player = strtolower(Str::slug($request->get('name')));

        return redirect(url('/characters', $player));
    }
}
