<?php

namespace Apolune\Contracts\Account;

interface PlayerProperties
{
    /**
     * Retrieve the original deletion date.
     *
     * @return string|null
     */
    public function deletion();

    /**
     * Retrieve the actual deletion date.
     *
     * @return \Carbon\Carbon
     */
    public function deletedAt();

    /**
     * Retrieve the hidden status.
     *
     * @return boolean
     */
    public function hidden();

    /**
     * Retrieve the comment.
     *
     * @return string
     */
    public function comment();

    /**
     * Retrieve the signature.
     *
     * @return string
     */
    public function signature();
}
