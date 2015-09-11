<?php

namespace Apolune\Contracts\News;

use ArrayAccess;
use JsonSerializable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Routing\UrlRoutable;
use Illuminate\Contracts\Queue\QueueableEntity;

interface Newsitem extends ArrayAccess, Arrayable, Jsonable, JsonSerializable, QueueableEntity, UrlRoutable
{
    /**
     * Retrieve the news ID.
     *
     * @return integer
     */
    public function id();

    /**
     * Retrieve the news slug.
     *
     * @return string
     */
    public function slug();

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
