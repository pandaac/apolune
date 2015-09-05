<?php

namespace Apolune\Contracts\News;

interface News
{
    /**
     * Retrieve the news ID.
     *
     * @return integer
     */
    public function id();

    /**
     * Retrieve the news title.
     *
     * @return string
     */
    public function title();

    /**
     * Retrieve the news content.
     *
     * @return string
     */
    public function content();

    /**
     * Retrieve the news type.
     *
     * @return string
     */
    public function type();

    /**
     * Retrieve the news icon.
     *
     * @return string
     */
    public function icon();

    /**
     * Retrieve the news creation date.
     *
     * @return \Carbon\Carbon
     */
    public function creation();
}
