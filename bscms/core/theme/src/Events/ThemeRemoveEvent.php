<?php

namespace Bytesoft\Theme\Events;

use Bytesoft\Base\Events\Event;
use Illuminate\Queue\SerializesModels;

class ThemeRemoveEvent extends Event
{
    use SerializesModels;

    /**
     * @var string
     */
    public $theme;

    /**
     * ThemeRemoveEvent constructor.
     * @param string
     */
    public function __construct($theme)
    {
        $this->theme = $theme;
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
