<?php

namespace Bytesoft\SeoHelper\Listeners;

use Bytesoft\Base\Events\DeletedContentEvent;
use Exception;
use SeoHelper;

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
            SeoHelper::deleteMetaData($event->screen, $event->data);
        } catch (Exception $exception) {
            info($exception->getMessage());
        }
    }
}
