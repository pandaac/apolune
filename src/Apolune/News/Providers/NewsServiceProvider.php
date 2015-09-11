<?php

namespace Apolune\News\Providers;

use Apolune\News;
use Apolune\Contracts\News as Contracts;
use Apolune\Core\AggregateServiceProvider;

class NewsServiceProvider extends AggregateServiceProvider
{
    /**
     * The provider class names.
     *
     * @var array
     */
    protected $providers = [
        MigrationServiceProvider::class,
    ];

    /**
     * Holds all of the contracts we want to bind.
     *
     * @var array
     */
    protected $bindings = [
        'news'      => [Contracts\News::class       => News\News::class],
        'newsitem'  => [Contracts\Newsitem::class   => News\Newsitem::class],
        'article'   => [Contracts\Article::class    => News\Article::class],
        'ticker'    => [Contracts\Ticker::class     => News\Ticker::class],
    ];
    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
