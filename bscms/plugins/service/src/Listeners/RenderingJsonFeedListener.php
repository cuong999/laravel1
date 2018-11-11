<?php

namespace Bytesoft\Service\Listeners;

use Bytesoft\Service\Repositories\Interfaces\ServiceInterface;

use Bytesoft\Base\Supports\JsonFeedManager;

class RenderingJsonFeedListener
{
    /**
     * @var JobsInterface
     */
    protected $serviceRepository;


    /**
     * RenderingSiteMapListener constructor.
     * @param PostInterface $postRepository
     * @param CategoryInterface $categoryRepository
     * @param TagInterface $tagRepository
     */
    public function __construct(
        JobsInterface $serviceRepository
    )
    {
        $this->$serviceRepository = $serviceRepository;
    }

    /**
     * Handle the event.
     *
     * @return void
     * @author Bytesoft
     */
    public function handle()
    {
        $services = $this->serviceRepository->getService(true);

        foreach ($services as $service) {
            JsonFeedManager::addItem('posts', [
                'id' => $service->id,
                'title' => $service->name,
                'url' => route('public.single', $service->slug),
                'image' => $service->image,
                'content_html' => $service->content,
                'date_published' => $service->created_at->tz('UTC')->toRfc3339String(),
                'date_modified' => $service->updated_at->tz('UTC')->toRfc3339String(),
            ]);
        }
    }
}
