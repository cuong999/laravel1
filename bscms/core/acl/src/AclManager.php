<?php

namespace Bytesoft\ACL;

use Bytesoft\ACL\Activations\ActivationRepositoryInterface;
use Bytesoft\ACL\Models\User;
use Bytesoft\ACL\Repositories\Interfaces\UserInterface;
use Bytesoft\ACL\Roles\RoleRepositoryInterface;
use InvalidArgumentException;

class AclManager
{

    /**
     * The User repository.
     *
     * @var \Bytesoft\ACL\Repositories\Interfaces\UserInterface
     */
    protected $users;

    /**
     * The Role repository.
     *
     * @var \Bytesoft\ACL\Roles\RoleRepositoryInterface
     */
    protected $roles;

    /**
     * The Activations repository.
     *
     * @var \Bytesoft\ACL\Activations\ActivationRepositoryInterface
     */
    protected $activations;

    /**
     * Create a new Acl instance.
     *
     * @param  \Bytesoft\ACL\Repositories\Interfaces\UserInterface $users
     * @param  \Bytesoft\ACL\Roles\RoleRepositoryInterface $roles
     * @param  \Bytesoft\ACL\Activations\ActivationRepositoryInterface $activations
     */
    public function __construct(
        UserInterface $users,
        RoleRepositoryInterface $roles,
        ActivationRepositoryInterface $activations
    )
    {
        $this->users = $users;

        $this->roles = $roles;

        $this->activations = $activations;
    }

    /**
     * Activates the given user.
     *
     * @param  mixed $user
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function activate($user)
    {
        if (!$user instanceof User) {
            throw new InvalidArgumentException('No valid user was provided.');
        }

        event('acl.activating', $user);

        $activations = $this->getActivationRepository();

        $activation = $activations->create($user);

        event('acl.activated', [$user, $activation]);

        return $activations->complete($user, $activation->getCode());
    }

    public function getUserRepository()
    {
        return $this->users;
    }

    /**
     * Returns the role repository.
     *
     * @return \Bytesoft\ACL\Roles\RoleRepositoryInterface
     */
    public function getRoleRepository()
    {
        return $this->roles;
    }

    /**
     * Sets the role repository.
     *
     * @param  \Bytesoft\ACL\Roles\RoleRepositoryInterface $roles
     * @return void
     */
    public function setRoleRepository(RoleRepositoryInterface $roles)
    {
        $this->roles = $roles;
    }

    /**
     * Returns the activations repository.
     *
     * @return \Bytesoft\ACL\Activations\ActivationRepositoryInterface
     */
    public function getActivationRepository()
    {
        return $this->activations;
    }

    /**
     * Sets the activations repository.
     *
     * @param  \Bytesoft\ACL\Activations\ActivationRepositoryInterface $activations
     * @return void
     */
    public function setActivationRepository(ActivationRepositoryInterface $activations)
    {
        $this->activations = $activations;
    }
}
