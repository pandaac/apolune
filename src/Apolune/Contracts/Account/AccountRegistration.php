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
     * Retrieve the country code.
     *
     * @return string
     */
    public function countryCode();

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

    /**
     * Retrieve the requested date.
     *
     * @return \Carbon\Carbon
     */
    public function requestDate();

    /**
     * Retrieve the requested firstname.
     *
     * @return string
     */
    public function requestFirstname();

    /**
     * Retrieve the requested surname.
     *
     * @return string
     */
    public function requestSurname();

    /**
     * Retrieve the requested country.
     *
     * @return \Apolune\Contracts\Server\Country
     */
    public function requestCountry();

    /**
     * Retrieve the requested country code.
     *
     * @return string
     */
    public function requestCountryCode();
}
