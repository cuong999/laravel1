<?php

namespace Bytesoft\Base\Listeners;

use Bytesoft\Base\Events\SendMailEvent;
use Bytesoft\Base\Supports\EmailAbstract;
use Exception;
use Illuminate\Contracts\Mail\Mailer;
use Log;

class SendMailListener
{

    /**
     * @var Mailer
     */
    protected $mailer;

    /**
     * SendMailListener constructor.
     * @param Mailer $mailer
     * @author Bytesoft
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param SendMailEvent $event
     * @return void
     * @author Bytesoft
     * @throws Exception
     */
    public function handle(SendMailEvent $event)
    {
        try {
            $this->mailer->to($event->to)
                ->send(new EmailAbstract($event->content, $event->title, $event->args));
            info('Sent mail to ' . $event->to . ' successfully!');
        } catch (Exception $ex) {
            if ($event->debug) {
                throw $ex;
            }
            Log::error($ex->getMessage());
        }
    }
}
