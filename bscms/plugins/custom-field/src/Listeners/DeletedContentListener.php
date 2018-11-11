<?php

namespace Bytesoft\CustomField\Listeners;

use Bytesoft\Base\Events\DeletedContentEvent;
use CustomField;
use Exception;

class DeletedContentListener
{

    /**
     * Handle the event.
     *
     * @param DeletedContentEvent $event
     * @return void
     * @author Bytesoft
     */
    public function handle(DeletedContentEvent $event)
    {
        try {
            CustomField::deleteCustomFields($event->screen, $event->data);
        } catch (Exception $exception) {
            info($exception->getMessage());
        }
    }
}
