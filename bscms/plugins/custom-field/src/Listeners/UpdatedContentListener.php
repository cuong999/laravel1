<?php

namespace Bytesoft\CustomField\Listeners;

use Bytesoft\Base\Events\UpdatedContentEvent;
use CustomField;
use Exception;

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
            CustomField::saveCustomFields($event->screen, $event->request, $event->data);
        } catch (Exception $exception) {
            info($exception->getMessage());
        }
    }
}
