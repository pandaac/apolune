<?php

namespace Apolune\News;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Apolune\News\Traits\ArticleItem;
use Apolune\Core\Database\Eloquent\Model;
use Apolune\Contracts\News\Article as Contract;

class Article extends Model implements Contract
{
    use ArticleItem;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = '__pandaac_news';

    /**
     * Retrieve the article ID.
     *
     * @return integer
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * Retrieve the article slug.
     *
     * @return string
     */
    public function slug()
    {
        return $this->slug;
    }

    /**
     * Retrieve the article title.
     *
     * @return string
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * Retrieve the article content.
     *
     * @return string
     */
    public function content()
    {
        return $this->content;
    }

    /**
     * Retrieve the article excerpt.
     *
     * @param  integer  $words  100
     * @param  string  $end  ...
     * @return string
     */
    public function excerpt($words = 100, $end = '...')
    {
        if (! $this->excerpt) {
            return Str::words(strip_tags($this->content()), $words, $end);
        }

        return strip_tags($this->excerpt);
    }

    /**
     * Retrieve the article type.
     *
     * @return string
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * Retrieve the article icon.
     *
     * @return string
     */
    public function icon()
    {
        return $this->icon;
    }

    /**
     * Retrieve the article image.
     *
     * @return string
     */
    public function image()
    {
        return strpos($this->image, '/') === 0 ? asset($this->image) : $this->image;
    }

    /**
     * Retrieve the article creation date.
     *
     * @return \Carbon\Carbon
     */
    public function creation()
    {
        return new Carbon($this->created_at);
    }
}
