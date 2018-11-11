<?php

namespace Bytesoft\Jobs\Listeners;

use Bytesoft\Jobs\Repositories\Interfaces\JobsInterface;

use Bytesoft\Base\Supports\SiteMapManager;

class RenderingSiteMapListener
{
    /**
     * @var JobsInterface
     */
    protected $jobsRepository;


    /**
     * RenderingSiteMapListener constructor.
     * @param JobsInterface $jobsRepository
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn
     */
    public function __construct(
        JobsInterface $jobsRepository
    )
    {
        $this->jobsRepository = $jobsRepository;
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
        $jobs = $this->jobsRepository->getDataSiteMap();

        foreach ($jobs as $job) {
            SiteMapManager::add(route('public.single', $job->slug), $job->updated_at, '0.8', 'daily');
        }
    }
}
