<?php

namespace Bytesoft\SeoHelper\Contracts\Entities;

use Bytesoft\SeoHelper\Contracts\RenderableContract;

interface WebmastersContract extends RenderableContract
{
    /**
     * Make Webmaster instance.
     *
     * @param  array $webmasters
     *
     * @return self
     * @author ARCANEDEV
     */
    public static function make(array $webmasters = []);

    /**
     * Add a webmaster to collection.
     *
     * @param  string $webmaster
     * @param  string $content
     *
     * @return self
     * @author ARCANEDEV
     */
    public function add($webmaster, $content);

    /**
     * Reset the webmaster collection.
     *
     * @return self
     * @author ARCANEDEV
     */
    public function reset();
}
