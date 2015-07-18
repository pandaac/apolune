<?php

namespace Apolune\Contracts\Account;

interface AccountRegistration
{
    /**
     * Retrieve the firstname.
     *
     * @return string
     */
    public function firstname();

    /**
     * Retrieve the surname.
     *
     * @return string
     */
    public function surname();

    /**
     * Retrieve the country.
     *
     * @return \Apolune\Contracts\Server\Country
     */
    public function country();

    /**
     * Retrieve the birthday.
     *
     * @return \Carbon\Carbon
     */
    public function birthday();

    /**
     * Retrieve the gender.
     *
     * @return string
     */
    public function gender();
}
