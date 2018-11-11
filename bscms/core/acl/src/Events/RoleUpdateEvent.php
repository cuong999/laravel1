<?php

namespace Bytesoft\ACL\Events;

use Bytesoft\ACL\Models\Role;
use Event;
use Illuminate\Queue\SerializesModels;

class RoleUpdateEvent extends Event
{
    use SerializesModels;

    /**
     * @var mixed
     */
    public $role;

    /**
     * RoleUpdateEvent constructor.
     * @param Role $role
     * @author Bytesoft
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
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
