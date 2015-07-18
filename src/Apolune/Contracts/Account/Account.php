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
     * Retrieve the account registration.
     *
     * @return \Apolune\Contracts\Account\AccountRegistration
     */
    public function registration();

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
     * Check if the account has been confirmed.
     *
     * @return boolean
     */
    public function isConfirmed();

    /**
     * Check if the account has been registered.
     *
     * @return boolean
     */
    public function isRegistered();

    /**
     * Check if the account has been deleted.
     *
     * @return boolean
     */
    public function isDeleted();

    /**
     * Check if the account has a pending email address.
     *
     * @return boolean
     */
    public function hasPendingEmail();
}
