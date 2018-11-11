<?php

namespace Bytesoft\Jobs\Http\Controllers;

use Bytesoft\Base\Events\BeforeEditContentEvent;
use Bytesoft\Jobs\Http\Requests\JobsRequest;
use Bytesoft\Jobs\Repositories\Interfaces\JobsInterface;
use Bytesoft\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Bytesoft\Jobs\Tables\JobsTable;
use Bytesoft\Base\Events\CreatedContentEvent;
use Bytesoft\Base\Events\DeletedContentEvent;
use Bytesoft\Base\Events\UpdatedContentEvent;
use Bytesoft\Base\Http\Responses\BaseHttpResponse;
use Bytesoft\Jobs\Forms\JobsForm;
use Bytesoft\Base\Forms\FormBuilder;
use Auth;
//use Bytesoft\Jobs\Models\Jobs;

class JobsController extends BaseController
{
    /**
     * @var JobsInterface
     */
    protected $jobsRepository;

    /**
     * JobsController constructor.
     * @param JobsInterface $jobsRepository
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */
    public function __construct(JobsInterface $jobsRepository)
    {
        $this->jobsRepository = $jobsRepository;
    }

    /**
     * Display all jobs
     * @param JobsTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     * @throws \Throwable
     */
    public function getList(JobsTable $table)
    {

        page_title()->setTitle(trans('plugins.jobs::jobs.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */
    public function getCreate(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins.jobs::jobs.create'));

        return $formBuilder->create(JobsForm::class)->renderForm();
    }

    /**
     * Insert new Jobs into database
     *
     * @param JobsRequest $request
     * @return BaseHttpResponse
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */
    public function postCreate(JobsRequest $request, BaseHttpResponse $response)
    {
        $jobs = $this->jobsRepository->createOrUpdate(array_merge($request->input(),
            [
                'user_id' => Auth::user()->getKey(),
                'featured' => $request->input('featured', false),
            ]));

        event(new CreatedContentEvent(JOBS_MODULE_SCREEN_NAME, $request, $jobs));

        return $response
            ->setPreviousUrl(route('jobs.list'))
            ->setNextUrl(route('jobs.edit', $jobs->id))
            ->setMessage(trans('core.base::notices.create_success_message'));
    }

    /**
     * Show edit form
     *
     * @param $id
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return string
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */
    public function getEdit($id, FormBuilder $formBuilder, Request $request)
    {
        $jobs = $this->jobsRepository->findOrFail($id);

        event(new BeforeEditContentEvent(JOBS_MODULE_SCREEN_NAME, $request, $jobs));

        page_title()->setTitle(trans('plugins.jobs::jobs.edit') . ' #' . $id);

        return $formBuilder->create(JobsForm::class)->setModel($jobs)->renderForm();
    }

    /**
     * @param $id
     * @param JobsRequest $request
     * @return BaseHttpResponse
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */
    public function postEdit($id, JobsRequest $request, BaseHttpResponse $response)
    {
        $jobs = $this->jobsRepository->findOrFail($id);

        $jobs->fill($request->input());

        $this->jobsRepository->createOrUpdate($jobs);

        event(new UpdatedContentEvent(JOBS_MODULE_SCREEN_NAME, $request, $jobs));

        return $response
            ->setPreviousUrl(route('jobs.list'))
            ->setMessage(trans('core.base::notices.update_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return BaseHttpResponse
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */
    public function getDelete(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $jobs = $this->jobsRepository->findOrFail($id);

            $this->jobsRepository->delete($jobs);

            event(new DeletedContentEvent(JOBS_MODULE_SCREEN_NAME, $request, $jobs));

            return $response->setMessage(trans('core.base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage(trans('core.base::notices.cannot_delete'));
        }
    }

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     */
    public function postDeleteMany(Request $request, BaseHttpResponse $response)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return $response
                ->setError()
                ->setMessage(trans('core.base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $jobs = $this->jobsRepository->findOrFail($id);
            $this->jobsRepository->delete($jobs);
            event(new DeletedContentEvent(JOBS_MODULE_SCREEN_NAME, $request, $jobs));
        }

        return $response->setMessage(trans('core.base::notices.delete_success_message'));
    }
}
