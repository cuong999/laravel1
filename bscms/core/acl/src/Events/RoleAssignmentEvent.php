<?php

namespace Bytesoft\ACL\Events;

use Bytesoft\ACL\Models\Role;
use Bytesoft\ACL\Models\User;
use Event;
use Illuminate\Queue\SerializesModels;

class RoleAssignmentEvent extends Event
{
    use SerializesModels;

    /**
     * @var mixed
     */
    public $role;

    /**
     * @var mixed
     */
    public $user;

    /**
     * RoleAssignmentEvent constructor.
     * @param Role $role
     * @param User $user
     * @author Bytesoft
     */
    public function __construct(Role $role, User $user)
    {
        $this->role = $role;
        $this->user = $user;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     * @author Bytesoft
     */
    public function broadcastOn()
    {
        return [];
    }
}
