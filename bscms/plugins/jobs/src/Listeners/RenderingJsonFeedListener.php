<?php

namespace Bytesoft\Jobs\Listeners;

use Bytesoft\Jobs\Repositories\Interfaces\JobsInterface;

use Bytesoft\Base\Supports\JsonFeedManager;

class RenderingJsonFeedListener
{
    /**
     * @var JobsInterface
     */
    protected $jobsRepository;


    /**
     * RenderingSiteMapListener constructor.
     * @param PostInterface $postRepository
     * @param CategoryInterface $categoryRepository
     * @param TagInterface $tagRepository
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
     * @author Bytesoft
     */
    public function handle()
    {
        $jobs = $this->jobsRepository->getAllJobs(true);

        foreach ($jobs as $job) {
            JsonFeedManager::addItem('posts', [
                'id' => $job->id,
                'title' => $job->name,
                'url' => route('public.single', $job->slug),
                'image' => $job->image,
                'content_html' => $job->content,
                'date_published' => $job->created_at->tz('UTC')->toRfc3339String(),
                'date_modified' => $job->updated_at->tz('UTC')->toRfc3339String(),
            ]);
        }
    }
}
