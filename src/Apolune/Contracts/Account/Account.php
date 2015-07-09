<?php

namespace Apolune\Contracts\Account;

use Illuminate\Contracts\Auth\Authenticatable as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPassword;

interface Account extends Authenticatable, CanResetPassword
{
    /**
     * Retrieve the account properties.
     *
     * @return \Apolune\Contracts\Account\AccountProperties
     */
    public function properties();

    /**
     * Retrieve the account players.
     *
     * @return \Apolune\Contracts\Account\Player
     */
    public function players();

    /**
     * Retrieve the account id.
     *
     * @return integer
     */
    public function id();

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

    /**
     * Retrieve the account type.
     *
     * @return integer
     */
    public function type();

    /**
     * Retrieve the account premium days.
     *
     * @return integer
     */
    public function premiumDays();

    /**
     * Retrieve the account last day.
     *
     * @return integer
     */
    public function lastDay();

    /**
     * Retrieve the account creation date.
     *
     * @return integer
     */
    public function creation();

    /**
     * Check if the account is currently awaiting an email change.
     *
     * @return boolean
     */
    public function isAwaitingEmailChange();

    /**
     * Get the requested email address.
     *
     * @return string
     */
    public function emailChange();

    /**
     * Get the date of when the requested email address change goes through.
     *
     * @return string
     */
    public function emailChangeDate();
}
