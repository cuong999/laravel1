<?php

namespace Bytesoft\SeoHelper\Listeners;

use Bytesoft\Base\Events\CreatedContentEvent;
use Exception;
use SeoHelper;

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
            SeoHelper::saveMetaData($event->screen, $event->request, $event->data);
        } catch (Exception $exception) {
            info($exception->getMessage());
        }
    }
}
