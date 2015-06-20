<?php

namespace Apolune\Support\Http\Controllers;

use Apolune\Core\Http\Controllers\Controller;

class FAQController extends Controller
{
    /**
     * Show the F.A.Q. page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme::support.faq');
    }
}
