<?php

namespace Bytesoft\ACL\Permissions;

interface PermissibleInterface
{
    /**
     * Returns the permissions instance.
     *
     * @return \Bytesoft\ACL\Permissions\PermissionsInterface
     */
    public function getPermissionsInstance();

    /**
     * Adds a permission.
     *
     * @param  string $permission
     * @param  bool $value
     * @return \Bytesoft\ACL\Permissions\PermissibleInterface
     */
    public function addPermission($permission, $value = true);

    /**
     * Updates a permission.
     *
     * @param  string $permission
     * @param  bool $value
     * @param  bool $create
     * @return \Bytesoft\ACL\Permissions\PermissibleInterface
     */
    public function updatePermission($permission, $value = true, $create = false);

    /**
     * Removes a permission.
     *
     * @param  string $permission
     * @return \Bytesoft\ACL\Permissions\PermissibleInterface
     */
    public function removePermission($permission);
}
