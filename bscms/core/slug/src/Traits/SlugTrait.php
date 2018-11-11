<?php

namespace Bytesoft\Slug\Traits;

use Bytesoft\Slug\Repositories\Interfaces\SlugInterface;

trait SlugTrait
{
    /**
     * @var string
     */
    protected $slug = '';

    /**
     * @var int
     */
    protected $slug_id = 0;

    /**
     * @return mixed
     * @author Bytesoft
     */
    public function getScreen()
    {
        return $this->screen;
    }

    /**
     * @return string
     * @author Bytesoft
     */
    public function getSlugAttribute()
    {
        if ($this->key != null) {
            return $this->key;
        }

        if ($this->slug != null) {
            return $this->slug;
        }

        $slug = app(SlugInterface::class)->getFirstBy([
            'reference' => $this->screen,
            'reference_id' => $this->id,
        ], ['id', 'key']);

        if ($slug) {
            $this->slug_id = $slug->id;
            $this->slug = $slug->key;
        }
        return $this->slug;
    }

    /**
     * @param $value
     * @return int
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn
     */
    public function getSlugIdAttribute()
    {
        if ($this->slug_id != 0) {
            return $this->slug_id;
        }

        $slug = app(SlugInterface::class)->getFirstBy([
            'reference' => $this->screen,
            'reference_id' => $this->id,
        ], ['id', 'key']);

        if ($slug) {
            $this->slug = $slug->key;
            $this->slug_id = $slug->id;
        }

        return $this->slug_id;
    }
}
