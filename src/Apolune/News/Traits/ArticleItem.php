<?php

namespace Apolune\News\Traits;

trait ArticleItem
{
    /**
     * Get a new query builder for the model's table.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function newQuery()
    {
        $builder = $this->newQueryWithoutScopes()->where('type', 'article');

        return $this->applyGlobalScopes($builder);
    }
}
