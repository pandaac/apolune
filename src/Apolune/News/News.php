<?php

namespace Apolune\News;

use Carbon\Carbon;
use Apolune\Contracts\News\Ticker;
use Apolune\Contracts\News\Article;
use Apolune\Contracts\News\Newsitem;
use Apolune\Core\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class News extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = '__pandaac_news';

    /**
     * Status of a combined query.
     *
     * @var boolean
     */
    protected $combined = false;

    /**
     * Create a collection of models from plain arrays.
     *
     * @param  array  $items
     * @param  string|null  $connection
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function hydrate(array $items, $connection = null)
    {
        $instances = [
            'news'      => app(Newsitem::class)->setConnection($connection),
            'article'   => app(Article::class)->setConnection($connection),
            'ticker'    => app(Ticker::class)->setConnection($connection),
        ];

        $items = array_map(function ($item) use ($instances) {
            $instance = isset($instances[$item->type]) ? $instances[$item->type] : head($instances);

            return $instance->newFromBuilder($item);
        }, $items);

        return head($instances)->newCollection($items);
    }

    /**
     * Scope a query to include newsitems.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNewsitems(Builder $query, $quantity)
    {
        $instance = ($combined = $this->combined) ? $query->getQuery()->newQuery()->from($this->getTable()) : $query;
        $instance = $instance->where('type', 'news')->take($quantity);

        $this->combined = true;

        return $combined ? $query->unionAll($instance) : $instance;
    }

    /**
     * Scope a query to include articles.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeArticles(Builder $query, $quantity)
    {
        $instance = ($combined = $this->combined) ? $query->getQuery()->newQuery()->from($this->getTable()) : $query;
        $instance = $instance->where('type', 'article')->take($quantity);

        $this->combined = true;

        return $combined ? $query->unionAll($instance) : $instance;
    }

    /**
     * Scope a query to include tickers.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTickers(Builder $query, $quantity)
    {
        $instance = ($combined = $this->combined) ? $query->getQuery()->newQuery()->from($this->getTable()) : $query;
        $instance = $instance->where('type', 'ticker')->take($quantity);

        $this->combined = true;

        return $combined ? $query->unionAll($instance) : $instance;
    }

    /**
     * Scope a query to only include newsitems.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNewsitem(Builder $query)
    {
        return $query->where('type', 'news');
    }

    /**
     * Scope a query to only include articles.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeArticle(Builder $query)
    {
        return $query->where('type', 'article');
    }

    /**
     * Scope a query to only include tickers.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTicker(Builder $query)
    {
        return $query->where('type', 'ticker');
    }
}
