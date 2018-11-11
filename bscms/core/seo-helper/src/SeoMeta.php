<?php

namespace Bytesoft\SeoHelper;

use Bytesoft\SeoHelper\Contracts\Entities\AnalyticsContract;
use Bytesoft\SeoHelper\Contracts\Entities\DescriptionContract;
use Bytesoft\SeoHelper\Contracts\Entities\KeywordsContract;
use Bytesoft\SeoHelper\Contracts\Entities\MiscTagsContract;
use Bytesoft\SeoHelper\Contracts\Entities\TitleContract;
use Bytesoft\SeoHelper\Contracts\Entities\WebmastersContract;
use Bytesoft\SeoHelper\Contracts\SeoMetaContract;

class SeoMeta implements SeoMetaContract
{

    /**
     * The Title instance.
     *
     * @var \Bytesoft\SeoHelper\Contracts\Entities\TitleContract
     */
    protected $title;

    /**
     * The Description instance.
     *
     * @var \Bytesoft\SeoHelper\Contracts\Entities\DescriptionContract
     */
    protected $description;

    /**
     * The Keywords instance.
     *
     * @var \Bytesoft\SeoHelper\Contracts\Entities\KeywordsContract
     */
    protected $keywords;

    /**
     * The MiscTags instance.
     *
     * @var \Bytesoft\SeoHelper\Contracts\Entities\MiscTagsContract
     */
    protected $misc;

    /**
     * The Webmasters instance.
     *
     * @var \Bytesoft\SeoHelper\Contracts\Entities\WebmastersContract
     */
    protected $webmasters;

    /**
     * The Analytics instance.
     *
     * @var \Bytesoft\SeoHelper\Contracts\Entities\AnalyticsContract
     */
    protected $analytics;

    /**
     * @var null
     */
    protected $currentUrl = null;

    /**
     * Make SeoMeta instance.
     * @author ARCANEDEV
     * @throws Exceptions\InvalidArgumentException
     */
    public function __construct()
    {
        $this->title(new Entities\Title());
        $this->description(new Entities\Description());
        $this->keywords(new Entities\Keywords());
        $this->misc(new Entities\MiscTags());
        $this->webmasters(new Entities\Webmasters());
        $this->analytics(new Entities\Analytics());
    }

    /**
     * Set the Title instance.
     *
     * @param  \Bytesoft\SeoHelper\Contracts\Entities\TitleContract $title
     *
     * @return \Bytesoft\SeoHelper\SeoMeta
     * @author ARCANEDEV
     */
    public function title(TitleContract $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Set the Description instance.
     *
     * @param  \Bytesoft\SeoHelper\Contracts\Entities\DescriptionContract $description
     *
     * @return \Bytesoft\SeoHelper\SeoMeta
     * @author ARCANEDEV
     */
    public function description(DescriptionContract $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set the Keywords instance.
     *
     * @param  \Bytesoft\SeoHelper\Contracts\Entities\KeywordsContract $keywords
     *
     * @return \Bytesoft\SeoHelper\SeoMeta
     * @author ARCANEDEV
     */
    public function keywords(KeywordsContract $keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Set the MiscTags instance.
     *
     * @param  \Bytesoft\SeoHelper\Contracts\Entities\MiscTagsContract $misc
     *
     * @return \Bytesoft\SeoHelper\SeoMeta
     * @author ARCANEDEV
     */
    public function misc(MiscTagsContract $misc)
    {
        $this->misc = $misc;

        return $this;
    }

    /**
     * Set the Webmasters instance.
     *
     * @param  \Bytesoft\SeoHelper\Contracts\Entities\WebmastersContract $webmasters
     *
     * @return \Bytesoft\SeoHelper\SeoMeta
     * @author ARCANEDEV
     */
    public function webmasters(WebmastersContract $webmasters)
    {
        $this->webmasters = $webmasters;

        return $this;
    }

    /**
     * Set the Analytics instance.
     *
     * @param  \Bytesoft\SeoHelper\Contracts\Entities\AnalyticsContract $analytics
     *
     * @return \Bytesoft\SeoHelper\SeoMeta
     * @author ARCANEDEV
     */
    protected function analytics(AnalyticsContract $analytics)
    {
        $this->analytics = $analytics;

        return $this;
    }

    /**
     * @param $code
     * @return $this
     * @author ARCANEDEV
     */
    public function setGoogle($code)
    {
        $this->analytics->setGoogle($code);
        return $this;
    }

    /**
     * Set the title.
     *
     * @param  string $title
     * @param  string $siteName
     * @param  string $separator
     *
     * @return \Bytesoft\SeoHelper\SeoMeta
     * @author ARCANEDEV
     */
    public function setTitle($title, $siteName = null, $separator = null)
    {
        if (!empty($title)) {
            $this->title->set($title);
        }

        if (!empty($siteName)) {
            $this->title->setSiteName($siteName);
        }

        if (!empty($separator)) {
            $this->title->setSeparator($separator);
        }

        return $this;
    }

    /**
     * Set the description content.
     *
     * @param  string $content
     *
     * @return \Bytesoft\SeoHelper\SeoMeta
     * @author ARCANEDEV
     */
    public function setDescription($content)
    {
        $this->description->set($content);

        return $this;
    }

    /**
     * Set the keywords content.
     *
     * @param  array|string $content
     *
     * @return \Bytesoft\SeoHelper\SeoMeta
     * @author ARCANEDEV
     */
    public function setKeywords($content)
    {
        $this->keywords->set($content);

        return $this;
    }

    /**
     * Add a keyword.
     *
     * @param  string $keyword
     *
     * @return \Bytesoft\SeoHelper\SeoMeta
     * @author ARCANEDEV
     */
    public function addKeyword($keyword)
    {
        $this->keywords->add($keyword);

        return $this;
    }

    /**
     * Add many keywords.
     *
     * @param  array $keywords
     *
     * @return \Bytesoft\SeoHelper\SeoMeta
     * @author ARCANEDEV
     */
    public function addKeywords(array $keywords)
    {
        $this->keywords->addMany($keywords);

        return $this;
    }

    /**
     * Add a webmaster tool site verifier.
     *
     * @param  string $webmaster
     * @param  string $content
     *
     * @return \Bytesoft\SeoHelper\SeoMeta
     * @author ARCANEDEV
     */
    public function addWebmaster($webmaster, $content)
    {
        $this->webmasters->add($webmaster, $content);

        return $this;
    }

    /**
     * Set the current URL.
     *
     * @param  string $url
     *
     * @return \Bytesoft\SeoHelper\SeoMeta
     * @author ARCANEDEV
     */
    public function setUrl($url)
    {
        $this->currentUrl = $url;
        $this->misc->setUrl($url);

        return $this;
    }

    /**
     * Set the Google Analytics code.
     *
     * @param  string $code
     *
     * @return \Bytesoft\SeoHelper\SeoMeta
     * @author ARCANEDEV
     */
    public function setGoogleAnalytics($code)
    {
        $this->analytics->setGoogle($code);

        return $this;
    }

    /**
     * Add a meta tag.
     *
     * @param  string $name
     * @param  string $content
     *
     * @return \Bytesoft\SeoHelper\SeoMeta
     * @author ARCANEDEV
     */
    public function addMeta($name, $content)
    {
        $this->misc->add($name, $content);

        return $this;
    }

    /**
     * Add many meta tags.
     *
     * @param  array $meta
     *
     * @return \Bytesoft\SeoHelper\SeoMeta
     * @author ARCANEDEV
     */
    public function addMetas(array $meta)
    {
        $this->misc->addMany($meta);

        return $this;
    }

    /**
     * Render all seo tags.
     *
     * @return string
     * @author ARCANEDEV
     */
    public function render()
    {
        return implode(PHP_EOL, array_filter([
            $this->title->render(),
            $this->description->render(),
            $this->keywords->render(),
            $this->misc->render(),
            $this->webmasters->render(),
            $this->analytics->render(),
        ]));
    }

    /**
     * Render all seo tags.
     *
     * @return string
     * @author ARCANEDEV
     */
    public function __toString()
    {
        return $this->render();
    }
}
