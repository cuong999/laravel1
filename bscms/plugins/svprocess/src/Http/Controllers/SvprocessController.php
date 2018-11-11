<?php

namespace Bytesoft\Svprocess\Http\Controllers;

use Bytesoft\Base\Events\BeforeEditContentEvent;
use Bytesoft\Svprocess\Http\Requests\SvprocessRequest;
use Bytesoft\Svprocess\Repositories\Interfaces\SvprocessInterface;
use Bytesoft\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Bytesoft\Svprocess\Tables\SvprocessTable;
use Bytesoft\Base\Events\CreatedContentEvent;
use Bytesoft\Base\Events\DeletedContentEvent;
use Bytesoft\Base\Events\UpdatedContentEvent;
use Bytesoft\Base\Http\Responses\BaseHttpResponse;
use Bytesoft\Svprocess\Forms\SvprocessForm;
use Bytesoft\Base\Forms\FormBuilder;

class SvprocessController extends BaseController
{
    /**
     * @var SvprocessInterface
     */
    protected $svprocessRepository;

    /**
     * SvprocessController constructor.
     * @param SvprocessInterface $svprocessRepository
     * @author Bytesoft
     */
    public function __construct(SvprocessInterface $svprocessRepository)
    {
        $this->svprocessRepository = $svprocessRepository;
    }

    /**
     * Display all svprocesses
     * @param SvprocessTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Bytesoft
     * @throws \Throwable
     */
    public function getList(SvprocessTable $table)
    {

        page_title()->setTitle(trans('plugins.svprocess::svprocess.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     * @author Bytesoft
     */
    public function getCreate(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins.svprocess::svprocess.create'));

        return $formBuilder->create(SvprocessForm::class)->renderForm();
    }

    /**
     * Insert new Svprocess into database
     *
     * @param SvprocessRequest $request
     * @return BaseHttpResponse
     * @author Bytesoft
     */
    public function postCreate(SvprocessRequest $request, BaseHttpResponse $response)
    {
        $svprocess = $this->svprocessRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(SVPROCESS_MODULE_SCREEN_NAME, $request, $svprocess));

        return $response
            ->setPreviousUrl(route('svprocess.list'))
            ->setNextUrl(route('svprocess.edit', $svprocess->id))
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
        $svprocess = $this->svprocessRepository->findOrFail($id);

        event(new BeforeEditContentEvent(SVPROCESS_MODULE_SCREEN_NAME, $request, $svprocess));

        page_title()->setTitle(trans('plugins.svprocess::svprocess.edit') . ' #' . $id);

        return $formBuilder->create(SvprocessForm::class)->setModel($svprocess)->renderForm();
    }

    /**
     * @param $id
     * @param SvprocessRequest $request
     * @return BaseHttpResponse
     * @author Bytesoft
     */
    public function postEdit($id, SvprocessRequest $request, BaseHttpResponse $response)
    {
        $svprocess = $this->svprocessRepository->findOrFail($id);

        $svprocess->fill($request->input());

        $this->svprocessRepository->createOrUpdate($svprocess);

        event(new UpdatedContentEvent(SVPROCESS_MODULE_SCREEN_NAME, $request, $svprocess));

        return $response
            ->setPreviousUrl(route('svprocess.list'))
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
            $svprocess = $this->svprocessRepository->findOrFail($id);

            $this->svprocessRepository->delete($svprocess);

            event(new DeletedContentEvent(SVPROCESS_MODULE_SCREEN_NAME, $request, $svprocess));

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
            $svprocess = $this->svprocessRepository->findOrFail($id);
            $this->svprocessRepository->delete($svprocess);
            event(new DeletedContentEvent(SVPROCESS_MODULE_SCREEN_NAME, $request, $svprocess));
        }

        return $response->setMessage(trans('core.base::notices.delete_success_message'));
    }
}
