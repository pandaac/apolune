<?php

namespace Apolune\News;

use Carbon\Carbon;
use Apolune\News\News;
use Apolune\News\Ticker;
use Apolune\News\Article;
use Apolune\Core\Database\Eloquent\Model;
use Apolune\Contracts\News\History as Contract;

class History extends Model implements Contract
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = '__pandaac_news';

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
            'news'      => (new News)->setConnection($connection),
            'article'   => (new Article)->setConnection($connection),
            'ticker'    => (new Ticker)->setConnection($connection),
        ];

        $items = array_map(function ($item) use ($instances) {
            $instance = isset($instances[$item->type]) ? $instances[$item->type] : head($instances);

            return $instance->newFromBuilder($item);
        }, $items);

        return head($instances)->newCollection($items);
    }
}
