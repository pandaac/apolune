<?php

namespace Apolune\Contracts\News;

use ArrayAccess;
use JsonSerializable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Routing\UrlRoutable;
use Illuminate\Contracts\Queue\QueueableEntity;

interface Article extends ArrayAccess, Arrayable, Jsonable, JsonSerializable, QueueableEntity, UrlRoutable
{
    /**
     * Retrieve the article ID.
     *
     * @return integer
     */
    public function id();

    /**
     * Retrieve the article slug.
     *
     * @return string
     */
    public function slug();

    /**
     * Retrieve the article title.
     *
     * @return string
     */
    public function title();

    /**
     * Retrieve the article content.
     *
     * @return string
     */
    public function content();

    /**
     * Retrieve the article excerpt.
     *
     * @param  integer  $words  100
     * @param  string  $end  ...
     * @return string
     */
    public function excerpt($words = 100, $end = '...');

    /**
     * Retrieve the article type.
     *
     * @return string
     */
    public function type();

    /**
     * Retrieve the article icon.
     *
     * @return string
     */
    public function icon();

    /**
     * Retrieve the article image.
     *
     * @return string
     */
    public function image();

    /**
     * Retrieve the article creation date.
     *
     * @return \Carbon\Carbon
     */
    public function creation();
}
