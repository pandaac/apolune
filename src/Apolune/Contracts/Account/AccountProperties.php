<?php

namespace Apolune\Contracts\Account;

interface AccountProperties
{
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

    /**
     * Retrieve the pending email address.
     *
     * @return string
     */
    public function email();

    /**
     * Retrieve the email verification code.
     *
     * @return string
     */
    public function emailCode();


    /**
     * Retrieve the pending email address date.
     *
     * @return \Carbon\Carbon
     */
    public function emailDate();

    /**
     * Retrieve the amount of email confirmation requests.
     *
     * @return integer
     */
    public function emailRequests();

    /**
     * Retrieve the deleted value.
     *
     * @return \Carbon\Carbon|null
     */
    public function deletion();
}
