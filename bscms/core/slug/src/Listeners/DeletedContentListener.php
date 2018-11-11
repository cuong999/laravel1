<?php

namespace Bytesoft\Slug\Listeners;

use Bytesoft\Base\Events\DeletedContentEvent;
use Bytesoft\Slug\Repositories\Interfaces\SlugInterface;
use Exception;

class DeletedContentListener
{

    /**
     * @var SlugInterface
     */
    protected $slugRepository;

    /**
     * SlugService constructor.
     * @param SlugInterface $slugRepository
     */
    public function __construct(SlugInterface $slugRepository)
    {
        $this->slugRepository = $slugRepository;
    }

    /**
     * Handle the event.
     *
     * @param DeletedContentEvent $event
     * @return void
     * @author Bytesoft
     */
    public function handle(DeletedContentEvent $event)
    {
        if (in_array($event->screen, config('core.slug.general.supported'))) {
            try {
                $this->slugRepository->deleteBy(['reference_id' => $event->data->id, 'reference' => $event->screen]);
            } catch (Exception $exception) {
                info($exception->getMessage());
            }
        }
    }
}
