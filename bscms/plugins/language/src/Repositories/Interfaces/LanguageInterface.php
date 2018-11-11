<?php

namespace Bytesoft\Language\Repositories\Interfaces;

use Bytesoft\Support\Repositories\Interfaces\RepositoryInterface;

interface LanguageInterface extends RepositoryInterface
{
    /**
     * @param array $select
     * @return mixed
     * @author Bytesoft
     * @since 2.1
     */
    public function getActiveLanguage($select = ['*']);

    /**
     * @param array $select
     * @return mixed
     * @author Bytesoft
     * @since 2.2
     */
    public function getDefaultLanguage($select = ['*']);
}
