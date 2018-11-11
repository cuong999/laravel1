<?php

namespace Bytesoft\SeoHelper\Contracts\Entities;

use Bytesoft\SeoHelper\Contracts\RenderableContract;

interface MetaCollectionContract extends RenderableContract
{
    /**
     * Add a meta to collection.
     *
     * @param  string $name
     * @param  string $content
     *
     * @return self
     * @author ARCANEDEV
     */
    public function add($name, $content);

    /**
     * Add many meta tags.
     *
     * @param  array $meta
     *
     * @return self
     * @author ARCANEDEV
     */
    public function addMany(array $meta);

    /**
     * Remove a meta from the meta collection by key.
     *
     * @param  array|string $names
     *
     * @return self
     * @author ARCANEDEV
     */
    public function remove($names);
}
