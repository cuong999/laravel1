<?php

namespace Bytesoft\Media\Repositories\Interfaces;

use Bytesoft\Support\Repositories\Interfaces\RepositoryInterface;

interface MediaFolderInterface extends RepositoryInterface
{

    /**
     * @param $folder_id
     * @param array $params
     * @param bool $withTrash
     * @return mixed
     */
    public function getFolderByParentId($folder_id, array $params = [], $withTrash = false);

    /**
     * @param $name
     * @param $parent_id
     * @return
     * @author Bytesoft
     */
    public function createSlug($name, $parent_id);

    /**
     * @param $name
     * @param $parent_id
     * @author Bytesoft
     */
    public function createName($name, $parent_id);

    /**
     * @param $parent_id
     * @param array $breadcrumbs
     * @return array
     */
    public function getBreadcrumbs($parent_id, $breadcrumbs = []);

    /**
     * @param $parent_id
     * @param array $params
     * @return mixed
     */
    public function getTrashed($parent_id, array $params = []);

    /**
     * @param $folder_id
     * @param bool $force
     */
    public function deleteFolder($folder_id, $force = false);

    /**
     * @param $parent_id
     * @param array $child
     * @return array
     */
    public function getAllChildFolders($parent_id, $child = []);

    /**
     * @param $folder_id
     * @param string $path
     * @return string
     * @author Bytesoft
     */
    public function getFullPath($folder_id, $path = '');

    /**
     * @param $folder_id
     * @author Bytesoft
     */
    public function restoreFolder($folder_id);

    /**
     * @return mixed
     * @author Bytesoft
     */
    public function emptyTrash();
}
