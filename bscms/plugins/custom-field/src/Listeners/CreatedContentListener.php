<?php

namespace Bytesoft\CustomField\Listeners;

use Bytesoft\Base\Events\CreatedContentEvent;
use CustomField;
use Exception;

class CreatedContentListener
{

    /**
     * Handle the event.
     *
     * @param CreatedContentEvent $event
     * @return void
     * @author Bytesoft
     */
    public function handle(CreatedContentEvent $event)
    {
        try {
            CustomField::saveCustomFields($event->screen, $event->request, $event->data);
        } catch (Exception $exception) {
            info($exception->getMessage());
        }
    }
}
