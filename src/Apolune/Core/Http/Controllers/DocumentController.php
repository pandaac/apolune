<?php namespace Apolune\Core\Http\Controllers;

use cebe\markdown\Markdown;

use Illuminate\Contracts\Foundation\Application;

class DocumentController extends Controller {

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
	 * Show the terms page.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function terms()
	{
		$document = $this->app['files']->get(
			base_path('/resources/docs/terms.md')
		);

		$markdown = (new Markdown)->parse($document);

		return view('theme::core.terms')->withDocument($markdown);
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

		$markdown = (new Markdown)->parse($document);

		return view('theme::core.rules')->withDocument($markdown);
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

		$markdown = (new Markdown)->parse($document);

		return view('theme::core.privacy')->withDocument($markdown);
	}

}
