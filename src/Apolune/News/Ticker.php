<?php

namespace Apolune\News;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Apolune\News\Traits\TickerItem;
use Apolune\Core\Database\Eloquent\Model;
use Apolune\Contracts\News\Ticker as Contract;

class Ticker extends Model implements Contract
{
    use TickerItem;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = '__pandaac_news';

    /**
     * Retrieve the ticker ID.
     *
     * @return integer
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * Retrieve the ticker content.
     *
     * @return string
     */
    public function content()
    {
        return $this->title;
    }

    /**
     * Retrieve the ticker excerpt.
     *
     * @param  integer  $limit  58
     * @param  string  $end  ...
     * @return string
     */
    public function excerpt($limit = 58, $end = ' ...')
    {
        return Str::limit($this->content(), $limit, $end);
    }

    /**
     * Retrieve the ticker type.
     *
     * @return string
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * Retrieve the ticker icon.
     *
     * @return string
     */
    public function icon()
    {
        return $this->icon;
    }

    /**
     * Retrieve the ticker creation date.
     *
     * @return \Carbon\Carbon
     */
    public function creation()
    {
        return new Carbon($this->created_at);
    }
}
