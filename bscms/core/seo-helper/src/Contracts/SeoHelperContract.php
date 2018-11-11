<?php

namespace Bytesoft\SeoHelper\Contracts;

interface SeoHelperContract extends RenderableContract
{
    /**
     * Get SeoMeta instance.
     *
     * @return \Bytesoft\SeoHelper\Contracts\SeoMetaContract
     * @author ARCANEDEV
     */
    public function meta();

    /**
     * Set SeoMeta instance.
     *
     * @param  \Bytesoft\SeoHelper\Contracts\SeoMetaContract $seoMeta
     *
     * @return self
     * @author ARCANEDEV
     */
    public function setSeoMeta(SeoMetaContract $seoMeta);

    /**
     * Get SeoOpenGraph instance.
     *
     * @return \Bytesoft\SeoHelper\Contracts\SeoOpenGraphContract
     * @author ARCANEDEV
     */
    public function openGraph();

    /**
     * Get SeoOpenGraph instance.
     *
     * @param  \Bytesoft\SeoHelper\Contracts\SeoOpenGraphContract $seoOpenGraph
     *
     * @return self
     * @author ARCANEDEV
     */
    public function setSeoOpenGraph(SeoOpenGraphContract $seoOpenGraph);

    /**
     * Get SeoTwitter instance.
     *
     * @return \Bytesoft\SeoHelper\Contracts\SeoTwitterContract
     * @author ARCANEDEV
     */
    public function twitter();

    /**
     * Set SeoTwitter instance.
     *
     * @param  \Bytesoft\SeoHelper\Contracts\SeoTwitterContract $seoTwitter
     *
     * @return self
     * @author ARCANEDEV
     */
    public function setSeoTwitter(SeoTwitterContract $seoTwitter);

    /**
     * Set title.
     *
     * @param  string $title
     * @param  string|null $siteName
     * @param  string|null $separator
     *
     * @return self
     * @author ARCANEDEV
     */
    public function setTitle($title, $siteName = null, $separator = null);

    /**
     * Set description.
     *
     * @param  string $description
     *
     * @return self
     * @author ARCANEDEV
     */
    public function setDescription($description);

    /**
     * Set keywords.
     *
     * @param  array|string $keywords
     *
     * @return self
     * @author ARCANEDEV
     */
    public function setKeywords($keywords);
}
