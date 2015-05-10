<?php namespace Apolune\Core\Traits;

use Illuminate\Auth\Authenticatable as Auth;
use Illuminate\Auth\Passwords\CanResetPassword;

trait Authenticatable {

	use Auth, CanResetPassword;

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		if ( ! $this->traits) return null;

		return $this->traits->getRememberToken($this->getRememberTokenName());
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		if ( ! $this->traits) return;

		$this->traits->setRememberToken($this->getRememberTokenName(), $value);
	}

}
