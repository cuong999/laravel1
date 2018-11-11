<?php

namespace Bytesoft\Slug\Listeners;

use Bytesoft\Base\Events\CreatedContentEvent;
use Bytesoft\Slug\Repositories\Interfaces\SlugInterface;
use Bytesoft\Slug\Services\SlugService;
use Exception;

class CreatedContentListener
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
     * @param CreatedContentEvent $event
     * @param SlugService $slugService
     * @return void
     * @author Bytesoft
     */
    public function handle(CreatedContentEvent $event)
    {
        if (in_array($event->screen, config('core.slug.general.supported'))) {
            try {
                $slug = $event->request->input('slug', $event->data->name . '-' . $event->data->id ?? time());
                $slugService = new SlugService(app(SlugInterface::class));

                $this->slugRepository->createOrUpdate([
                    'key' => $slugService->create($slug, $event->data->slug_id, $event->screen),
                    'reference' => $event->screen,
                    'reference_id' => $event->data->id,
                    'prefix' => config('core.slug.general.prefixes.' . $event->screen, ''),
                ]);
            } catch (Exception $exception) {
                info($exception->getMessage());
            }
        }
    }
}
