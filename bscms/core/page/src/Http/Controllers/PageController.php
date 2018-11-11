<?php

namespace Bytesoft\Page\Http\Controllers;

use Auth;
use Bytesoft\Base\Events\BeforeEditContentEvent;
use Bytesoft\Base\Events\CreatedContentEvent;
use Bytesoft\Base\Events\DeletedContentEvent;
use Bytesoft\Base\Events\UpdatedContentEvent;
use Bytesoft\Base\Http\Controllers\BaseController;
use Bytesoft\Base\Http\Responses\BaseHttpResponse;
use Bytesoft\Page\Forms\PageForm;
use Bytesoft\Page\Tables\PageTable;
use Bytesoft\Page\Http\Requests\PageRequest;
use Bytesoft\Page\Repositories\Interfaces\PageInterface;
use Exception;
use Illuminate\Http\Request;
use Bytesoft\Base\Forms\FormBuilder;

class PageController extends BaseController
{

    /**
     * @var PageInterface
     */
    protected $pageRepository;

    /**
     * PageController constructor.
     * @param PageInterface $pageRepository
     * @author Bytesoft
     */
    public function __construct(PageInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    /**
     * @param PageTable $dataTable
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     * @author Bytesoft
     * @throws \Throwable
     */
    public function getList(PageTable $dataTable)
    {
        page_title()->setTitle(trans('core.page::pages.menu_name'));

        return $dataTable->renderTable();
    }

    /**
     * @return string
     * @author Bytesoft
     */
    public function getCreate(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('core.page::pages.create'));

        return $formBuilder->create(PageForm::class)->renderForm();
    }

    /**
     * @param PageRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @author Bytesoft
     */
    public function postCreate(PageRequest $request, BaseHttpResponse $response)
    {
        $page = $this->pageRepository->createOrUpdate(array_merge($request->input(), [
            'user_id' => Auth::user()->getKey(),
            'featured' => $request->input('featured', false),
        ]));

        event(new CreatedContentEvent(PAGE_MODULE_SCREEN_NAME, $request, $page));

        return $response->setPreviousUrl(route('pages.list'))
            ->setNextUrl(route('pages.edit', $page->id))
            ->setMessage(trans('core.base::notices.create_success_message'));
    }

    /**
     * @param $id
     * @return string
     * @author Bytesoft
     */
    public function getEdit($id, FormBuilder $formBuilder)
    {
        $page = $this->pageRepository->findOrFail($id);

        event(new BeforeEditContentEvent(PAGE_MODULE_SCREEN_NAME, request(), $page));

        page_title()->setTitle(trans('core.page::pages.edit') . ' #' . $id);

        return $formBuilder->create(PageForm::class)->setModel($page)->renderForm();
    }

    /**
     * @param $id
     * @param PageRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @author Bytesoft
     */
    public function postEdit($id, PageRequest $request, BaseHttpResponse $response)
    {
        $page = $this->pageRepository->findOrFail($id);
        $page->fill($request->input());
        $page->featured = $request->input('featured', false);

        $page = $this->pageRepository->createOrUpdate($page);

        event(new UpdatedContentEvent(PAGE_MODULE_SCREEN_NAME, $request, $page));

        return $response->setPreviousUrl(route('pages.list'))
            ->setMessage(trans('core.base::notices.update_success_message'));
    }

    /**
     * @param Request $request
     * @param $id
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @author Bytesoft
     */
    public function getDelete(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $page = $this->pageRepository->findOrFail($id);
            $this->pageRepository->delete($page);

            event(new DeletedContentEvent(PAGE_MODULE_SCREEN_NAME, $request, $page));

            return $response->setMessage(trans('core.page::pages.deleted'));
        } catch (Exception $ex) {
            return $response
                ->setError()
                ->setMessage($ex->getMessage());
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
            $page = $this->pageRepository->findOrFail($id);
            $this->pageRepository->delete($page);

            event(new DeletedContentEvent(PAGE_MODULE_SCREEN_NAME, $request, $page));
        }

        return $response->setMessage(trans('core.page::pages.deleted'));
    }
}
