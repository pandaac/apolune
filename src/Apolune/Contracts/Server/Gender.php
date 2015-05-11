<?php namespace Apolune\Contracts\Server;

interface Gender {

	/**
	 * Create a new gender instance.
	 *
	 * @param  array  $gender
	 * @return void
	 */
	public function __construct(array $gender);

	/**
	 * Get the gender id.
	 *
	 * @return integer
	 */
	public function id();

	/**
	 * Get the gender name.
	 *
	 * @return string
	 */
	public function name();

}
