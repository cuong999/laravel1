<?php

namespace Bytesoft\Note\Listeners;

use Bytesoft\Base\Events\DeletedContentEvent;
use Exception;
use Note;

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
            Note::deleteNote($event->screen, $event->data);
        } catch (Exception $exception) {
            info($exception->getMessage());
        }
    }
}
