<?php

namespace Bytesoft\Slug\Http\Controllers;

use Bytesoft\Base\Http\Controllers\BaseController;
use Bytesoft\Slug\Http\Requests\SlugRequest;
use Bytesoft\Slug\Repositories\Interfaces\SlugInterface;
use Bytesoft\Slug\Services\SlugService;

class SlugController extends BaseController
{
    /**
     * @var SlugInterface
     */
    protected $slugRepository;

    /**
     * @var SlugService
     */
    protected $slugService;

    /**
     * SlugController constructor.
     * @param SlugInterface $slugRepository
     * @param SlugService $slugService
     * @author Bytesoft
     */
    public function __construct(SlugInterface $slugRepository, SlugService $slugService)
    {
        $this->slugRepository = $slugRepository;
        $this->slugService = $slugService;
    }

    /**
     * @param SlugRequest $request
     * @return int|string
     */
    public function postCreate(SlugRequest $request)
    {
        return $this->slugService->create($request->input('name'), $request->input('slug_id'), $request->input('screen'));
    }
}
