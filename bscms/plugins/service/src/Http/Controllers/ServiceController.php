<?php

namespace Bytesoft\Service\Http\Controllers;

use Bytesoft\Base\Events\BeforeEditContentEvent;
use Bytesoft\Service\Http\Requests\ServiceRequest;
use Bytesoft\Service\Repositories\Interfaces\ServiceInterface;
use Bytesoft\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Bytesoft\Service\Tables\ServiceTable;
use Bytesoft\Base\Events\CreatedContentEvent;
use Bytesoft\Base\Events\DeletedContentEvent;
use Bytesoft\Base\Events\UpdatedContentEvent;
use Bytesoft\Base\Http\Responses\BaseHttpResponse;
use Bytesoft\Service\Forms\ServiceForm;
use Bytesoft\Base\Forms\FormBuilder;

class ServiceController extends BaseController
{
    /**
     * @var ServiceInterface
     */
    protected $serviceRepository;

    /**
     * ServiceController constructor.
     * @param ServiceInterface $serviceRepository
     * @author Bytesoft
     */
    public function __construct(ServiceInterface $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * Display all services
     * @param ServiceTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Bytesoft
     * @throws \Throwable
     */
    public function getList(ServiceTable $table)
    {

        page_title()->setTitle(trans('plugins.service::service.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     * @author Bytesoft
     */
    public function getCreate(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins.service::service.create'));

        return $formBuilder->create(ServiceForm::class)->renderForm();
    }

    /**
     * Insert new Service into database
     *
     * @param ServiceRequest $request
     * @return BaseHttpResponse
     * @author Bytesoft
     */
    public function postCreate(ServiceRequest $request, BaseHttpResponse $response)
    {
        $service = $this->serviceRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(SERVICE_MODULE_SCREEN_NAME, $request, $service));

        return $response
            ->setPreviousUrl(route('service.list'))
            ->setNextUrl(route('service.edit', $service->id))
            ->setMessage(trans('core.base::notices.create_success_message'));
    }

    /**
     * Show edit form
     *
     * @param $id
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return string
     * @author Bytesoft
     */
    public function getEdit($id, FormBuilder $formBuilder, Request $request)
    {
        $service = $this->serviceRepository->findOrFail($id);

        event(new BeforeEditContentEvent(SERVICE_MODULE_SCREEN_NAME, $request, $service));

        page_title()->setTitle(trans('plugins.service::service.edit') . ' #' . $id);

        return $formBuilder->create(ServiceForm::class)->setModel($service)->renderForm();
    }

    /**
     * @param $id
     * @param ServiceRequest $request
     * @return BaseHttpResponse
     * @author Bytesoft
     */
    public function postEdit($id, ServiceRequest $request, BaseHttpResponse $response)
    {
        $service = $this->serviceRepository->findOrFail($id);

        $service->fill($request->input());

        $this->serviceRepository->createOrUpdate($service);

        event(new UpdatedContentEvent(SERVICE_MODULE_SCREEN_NAME, $request, $service));

        return $response
            ->setPreviousUrl(route('service.list'))
            ->setMessage(trans('core.base::notices.update_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return BaseHttpResponse
     * @author Bytesoft
     */
    public function getDelete(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $service = $this->serviceRepository->findOrFail($id);

            $this->serviceRepository->delete($service);

            event(new DeletedContentEvent(SERVICE_MODULE_SCREEN_NAME, $request, $service));

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
     * @author Bytesoft
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
            $service = $this->serviceRepository->findOrFail($id);
            $this->serviceRepository->delete($service);
            event(new DeletedContentEvent(SERVICE_MODULE_SCREEN_NAME, $request, $service));
        }

        return $response->setMessage(trans('core.base::notices.delete_success_message'));
    }
}
