<?php namespace Apolune\Contracts\Account\Traits;

interface Account {

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @param  string  $column
	 * @return string
	 */
	public function getRememberToken($column);

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $column
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($column, $value);

}
