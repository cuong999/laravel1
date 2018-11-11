<?php

namespace Bytesoft\Service\Listeners;

use Bytesoft\Service\Repositories\Interfaces\ServiceInterface;

use Bytesoft\Base\Supports\SiteMapManager;

class RenderingSiteMapListener
{
    /**
     * @var ServiceInterface
     */
    protected $serviceRepository;


    /**
     * RenderingSiteMapListener constructor.
     * @param PostInterface $postRepository
     * @param CategoryInterface $categoryRepository
     * @param TagInterface $tagRepository
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */
    public function __construct(
        ServiceInterface $serviceRepository
    )
    {
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * Handle the event.
     *
     * @return void
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */
    public function handle()
    {
        $services = $this->serviceRepository->getDataSiteMap();

        foreach ($services as $service) {
            SiteMapManager::add(route('public.single', $service->slug), $service->updated_at, '0.8', 'daily');
        }
    }
}
