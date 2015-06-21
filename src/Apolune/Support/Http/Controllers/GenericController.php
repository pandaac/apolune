<?php

namespace Apolune\Support\Http\Controllers;

use Apolune\Core\Http\Controllers\Controller;

class GenericController extends Controller
{
    /**
     * Show the F.A.Q. page.
     *
     * @return \Illuminate\Http\Response
     */
    public function faq()
    {
        return view('theme::support.faq');
    }

    /**
     * Show the tutor guide page.
     *
     * @return \Illuminate\Http\Response
     */
    public function tutor()
    {
        return view('theme::support.tutor');
    }
}
