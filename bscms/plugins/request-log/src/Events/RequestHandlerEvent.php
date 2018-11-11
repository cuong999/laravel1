<?php

namespace Bytesoft\RequestLog\Events;

use Event;
use Illuminate\Queue\SerializesModels;

class RequestHandlerEvent extends Event
{
    use SerializesModels;

    /**
     * @var mixed
     */
    public $code;

    /**
     * RequestHandlerEvent constructor.
     * @param int $code
     * @author Bytesoft
     */
    public function __construct($code)
    {
        $this->code = $code;
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
