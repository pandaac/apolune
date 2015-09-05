<?php

namespace Apolune\Contracts\News;

interface Ticker
{
    /**
     * Retrieve the ticker ID.
     *
     * @return integer
     */
    public function id();

    /**
     * Retrieve the ticker content.
     *
     * @return string
     */
    public function content();

    /**
     * Retrieve the ticker excerpt.
     *
     * @param  integer  $limit  300
     * @param  string  $end  ...
     * @return string
     */
    public function excerpt($limit = 300, $end = '...');

    /**
     * Retrieve the ticker type.
     *
     * @return string
     */
    public function type();

    /**
     * Retrieve the ticker icon.
     *
     * @return string
     */
    public function icon();

    /**
     * Retrieve the ticker creation date.
     *
     * @return \Carbon\Carbon
     */
    public function creation();
}
