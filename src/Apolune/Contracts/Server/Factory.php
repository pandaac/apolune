<?php namespace Apolune\Contracts\Server;

use Illuminate\Contracts\Foundation\Application;

interface Factory {

	/**
	 * Create a new Factory instance.
	 *
	 * @param  \Illuminate\Contracts\Foundation\Application  $app
	 * @param  string  $file
	 * @return void
	 */
	public function __construct(Application $app, $file);

	/**
	 * Get all of the genders.
	 *
	 * @return array
	 */
	public function genders();

	/**
	 * Get all of the vocations.
	 *
	 * @param  boolean  $starter  null
	 * @return array
	 */
	public function vocations($starter = null);

	/**
	 * Get all of the worlds.
	 *
	 * @return array
	 */
	public function worlds();

}
