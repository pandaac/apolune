<?php namespace Apolune\Core\Console\Commands;

use Exception;

use Illuminate\Console\Command;

class FetchCreatureInfo extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'pandaac:fetch-creatures';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Fetch the latest creature information (w/ images) from Tibia.com.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$creatures = $this->getCreatures('http://www.tibia.com/library/?subtopic=creatures');

		$this->info($creatures);
	}

	protected function getCreatures($url)
	{
		$response = $this->request($url);

		preg_match('/<div.*BoxContent.*>(.*)<\/div>/is', $response, $matches);

		if (empty($matches[0])) return [];

		preg_match_all('/<a.*href="(.*)".*>/is', $matches[0], $creatures);

		dd(json_encode($matches[2]));
	}

	protected function request($url)
	{
		$request = curl_init($url);

		curl_setopt($request, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($request);

		curl_close($request);

		return $response;
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [];
	}

}
