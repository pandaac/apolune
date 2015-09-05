<?php

namespace Apolune\News;

use Carbon\Carbon;
use Apolune\News\Traits\NewsItem;
use Apolune\Core\Database\Eloquent\Model;
use Apolune\Contracts\News\News as Contract;

class News extends Model implements Contract
{
    use NewsItem;

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
        return $this->id;
    }

    /**
     * Retrieve the news title.
     *
     * @return string
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * Retrieve the news content.
     *
     * @return string
     */
    public function content()
    {
        return $this->content;
    }

    /**
     * Retrieve the news type.
     *
     * @return string
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * Retrieve the news icon.
     *
     * @return string
     */
    public function icon()
    {
        return $this->icon;
    }

    /**
     * Retrieve the news creation date.
     *
     * @return \Carbon\Carbon
     */
    public function creation()
    {
        return new Carbon($this->created_at);
    }
}
