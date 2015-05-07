<?php namespace Apolune\Contracts\Account;

interface Account {

	/**
	 * Retrieve the account name.
	 *
	 * @return string
	 */
	public function name();

	/**
	 * Retrieve the account email.
	 *
	 * @return string
	 */
	public function email();

}
