<?php

namespace Apolune\News;

use Carbon\Carbon;
use Apolune\Core\Database\Eloquent\Model;
use Apolune\Contracts\News\Newsitem as Contract;

class Newsitem extends Model implements Contract
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = '__pandaac_news';
    
    /**
     * Retrieve the news ID.
     *
     * @return integer
     */
    public function id()
    {
        return $this->attributes['id'];
    }

    /**
     * Retrieve the news slug.
     *
     * @return string
     */
    public function slug()
    {
        return $this->attributes['slug'];
    }

    /**
     * Retrieve the news title.
     *
     * @return string
     */
    public function title()
    {
        return $this->attributes['title'];
    }

    /**
     * Retrieve the news content.
     *
     * @return string
     */
    public function content()
    {
        return $this->attributes['content'];
    }

    /**
     * Retrieve the news type.
     *
     * @return string
     */
    public function type()
    {
        return $this->attributes['type'];
    }

    /**
     * Retrieve the news icon.
     *
     * @return string
     */
    public function icon()
    {
        return $this->attributes['icon'];
    }

    /**
     * Retrieve the news creation date.
     *
     * @return \Carbon\Carbon
     */
    public function creation()
    {
        return new Carbon($this->attributes['created_at']);
    }
}
