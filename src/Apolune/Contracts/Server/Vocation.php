<?php namespace Apolune\Contracts\Server;

interface Vocation {

	/**
	 * Create a new vocation instance.
	 *
	 * @param  array  $vocation
	 * @return void
	 */
	public function __construct(array $vocation);

	/**
	 * Get the vocation id.
	 *
	 * @return integer
	 */
	public function id();

	/**
	 * Get the vocation name.
	 *
	 * @return string
	 */
	public function name();

	/**
	 * Check if the vocation is a starter.
	 *
	 * @return boolean
	 */
	public function isStarter();

}
