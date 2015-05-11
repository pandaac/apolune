<?php namespace Apolune\Server;

use Apolune\Server\Services\World;
use Apolune\Server\Services\Gender;
use Apolune\Server\Services\Vocation;
use Apolune\Contracts\Server\Factory as FactoryContract;

use Illuminate\Contracts\Foundation\Application;

class Factory implements FactoryContract {

	/**
	 * Holds the server data.
	 *
	 * @var \StdClass
	 */
	protected $data;

	/**
	 * Create a new Factory instance.
	 *
	 * @param  \Illuminate\Contracts\Foundation\Application  $app
	 * @param  string  $file
	 * @return void
	 */
	public function __construct(Application $app, $file)
	{
		$this->data = json_decode($app['files']->get($file));
	}

	/**
	 * Get all of the genders.
	 *
	 * @return array
	 */
	public function genders()
	{
		$genders = $this->data->genders;

		array_walk($genders, function(&$gender)
		{
			$gender = new Gender((array) $gender);
		});

		return collect($genders);
	}

	/**
	 * Get all of the vocations.
	 *
	 * @param  boolean  $starter  null
	 * @return array
	 */
	public function vocations($starter = null)
	{
		$vocations = $this->data->vocations;

		array_walk($vocations, function(&$vocation)
		{
			$vocation = new Vocation((array) $vocation);
		});

		return collect($vocations)->reject(function($vocation) use ($starter)
		{
			return $starter and ! $vocation->isStarter();
		});
	}

	/**
	 * Get all of the worlds.
	 *
	 * @return array
	 */
	public function worlds()
	{
		$worlds = $this->data->worlds;

		array_walk($worlds, function(&$world)
		{
			$world = new World((array) $world);
		});

		return collect($worlds);
	}

}
