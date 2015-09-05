<?php

namespace Apolune\News\Traits;

trait TickerItem
{
    /**
     * Get a new query builder for the model's table.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function newQuery()
    {
        $builder = $this->newQueryWithoutScopes()->where('type', 'ticker');

        return $this->applyGlobalScopes($builder);
    }
}
