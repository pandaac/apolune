<?php

namespace Apolune\Support\Http\Controllers;

use Michelf\Markdown;
use Apolune\Core\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;

class LegalController extends Controller
{
    /**
     * The Application implementation.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * Create a new document controller instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Show the legal documents page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme::support.legal');
    }

    /**
     * Show the privacy page.
     *
     * @return \Illuminate\Http\Response
     */
    public function privacy()
    {
        $document = $this->app['files']->get(
            base_path('/resources/docs/privacy.md')
        );

        $markdown = Markdown::defaultTransform($document);

        return view('theme::support.privacy')->withDocument($markdown);
    }

    /**
     * Show the rules page.
     *
     * @return \Illuminate\Http\Response
     */
    public function rules()
    {
        $document = $this->app['files']->get(
            base_path('/resources/docs/rules.md')
        );

        $markdown = Markdown::defaultTransform($document);

        return view('theme::support.rules')->withDocument($markdown);
    }

    /**
     * Show the terms page.
     *
     * @return \Illuminate\Http\Response
     */
    public function terms()
    {
        $document = $this->app['files']->get(
            base_path('/resources/docs/terms.md')
        );

        $markdown = Markdown::defaultTransform($document);

        return view('theme::support.terms')->withDocument($markdown);
    }
}
