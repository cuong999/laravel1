<?php

namespace Bytesoft\AuditLog\Listeners;

use Bytesoft\AuditLog\Events\AuditHandlerEvent;
use Bytesoft\Base\Events\UpdatedContentEvent;
use Exception;
use AuditLog;

class UpdatedContentListener
{

    /**
     * Handle the event.
     *
     * @param UpdatedContentEvent $event
     * @return void
     * @author Bytesoft
     */
    public function handle(UpdatedContentEvent $event)
    {
        try {
            if ($event->data->id) {
                event(new AuditHandlerEvent($event->screen, 'updated', $event->data->id, AuditLog::getReferenceName($event->screen, $event->data), 'primary'));
            }
        } catch (Exception $exception) {
            info($exception->getMessage());
        }
    }
}
