<?php

namespace Bytesoft\ACL\Activations;

use Bytesoft\ACL\Models\User;

interface ActivationRepositoryInterface
{
    /**
     * Create a new activation record and code.
     *
     * @param  \Bytesoft\ACL\Models\User $user
     * @return \Bytesoft\ACL\Activations\ActivationInterface
     */
    public function create(User $user);

    /**
     * Checks if a valid activation for the given user exists.
     *
     * @param  \Bytesoft\ACL\Models\User $user
     * @param  string $code
     * @return \Bytesoft\ACL\Activations\ActivationInterface|bool
     */
    public function exists(User $user, $code = null);

    /**
     * Completes the activation for the given user.
     *
     * @param  \Bytesoft\ACL\Models\User $user
     * @param  string $code
     * @return bool
     */
    public function complete(User $user, $code);

    /**
     * Checks if a valid activation has been completed.
     *
     * @param  \Bytesoft\ACL\Models\User $user
     * @return \Bytesoft\ACL\Activations\ActivationInterface|bool
     */
    public function completed(User $user);

    /**
     * Remove an existing activation (deactivate).
     *
     * @param  \Bytesoft\ACL\Models\User $user
     * @return bool|null
     */
    public function remove(User $user);

    /**
     * Remove expired activation codes.
     *
     * @return int
     */
    public function removeExpired();
}
