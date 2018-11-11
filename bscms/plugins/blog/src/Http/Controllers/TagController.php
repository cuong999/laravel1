<?php

namespace Bytesoft\Blog\Http\Controllers;

use Bytesoft\Base\Events\BeforeEditContentEvent;
use Bytesoft\Base\Forms\FormBuilder;
use Bytesoft\Base\Http\Controllers\BaseController;
use Bytesoft\Base\Http\Responses\BaseHttpResponse;
use Bytesoft\Blog\Forms\TagForm;
use Bytesoft\Blog\Tables\TagTable;
use Bytesoft\Blog\Http\Requests\TagRequest;
use Bytesoft\Blog\Repositories\Interfaces\TagInterface;
use Exception;
use Illuminate\Http\Request;
use Auth;
use Bytesoft\Base\Events\CreatedContentEvent;
use Bytesoft\Base\Events\DeletedContentEvent;
use Bytesoft\Base\Events\UpdatedContentEvent;

class TagController extends BaseController
{

    /**
     * @var TagInterface
     */
    protected $tagRepository;

    /**
     * @param TagInterface $tagRepository
     */
    public function __construct(TagInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    /**
     * @param TagTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Bytesoft
     * @throws \Throwable
     */
    public function getList(TagTable $dataTable)
    {
        page_title()->setTitle(trans('plugins.blog::tags.menu'));

        return $dataTable->renderTable();
    }

    /**
     * @return string
     * @author Bytesoft
     */
    public function getCreate(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins.blog::tags.create'));

        return $formBuilder->create(TagForm::class)->renderForm();
    }

    /**
     * @param TagRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @author Bytesoft
     */
    public function postCreate(TagRequest $request, BaseHttpResponse $response)
    {
        $tag = $this->tagRepository->createOrUpdate(array_merge($request->input(), ['user_id' => Auth::user()->getKey()]));
        event(new CreatedContentEvent(TAG_MODULE_SCREEN_NAME, $request, $tag));

        return $response
            ->setPreviousUrl(route('tags.list'))
            ->setNextUrl(route('tags.edit', $tag->id))
            ->setMessage(trans('core.base::notices.create_success_message'));
    }

    /**
     * @param int $id
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return string
     * @author Bytesoft
     */
    public function getEdit($id, Request $request, FormBuilder $formBuilder)
    {
        $tag = $this->tagRepository->findOrFail($id);

        event(new BeforeEditContentEvent(TAG_MODULE_SCREEN_NAME, $request, $tag));

        page_title()->setTitle(trans('plugins.blog::tags.edit') . ' #' . $id);

        return $formBuilder->create(TagForm::class)->setModel($tag)->renderForm();
    }

    /**
     * @param int $id
     * @param TagRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @author Bytesoft
     */
    public function postEdit($id, TagRequest $request, BaseHttpResponse $response)
    {
        $tag = $this->tagRepository->findOrFail($id);
        $tag->fill($request->input());

        $this->tagRepository->createOrUpdate($tag);
        event(new UpdatedContentEvent(TAG_MODULE_SCREEN_NAME, $request, $tag));

        return $response
            ->setPreviousUrl(route('tags.list'))
            ->setMessage(trans('core.base::notices.update_success_message'));
    }

    /**
     * @param Request $request
     * @param int $id
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @author Bytesoft
     */
    public function getDelete(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $tag = $this->tagRepository->findOrFail($id);
            $this->tagRepository->delete($tag);

            event(new DeletedContentEvent(TAG_MODULE_SCREEN_NAME, $request, $tag));

            return $response->setMessage(trans('plugins.blog::tags.deleted'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage(trans('plugins.blog::tags.cannot_delete'));
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
                ->setMessage(trans('plugins.blog::tags.notices.no_select'));
        }

        foreach ($ids as $id) {
            $tag = $this->tagRepository->findOrFail($id);
            $this->tagRepository->delete($tag);

            event(new DeletedContentEvent(TAG_MODULE_SCREEN_NAME, $request, $tag));
        }
        return $response
            ->setData($request->input('status'))
            ->setMessage(trans('plugins.blog::tags.deleted'));
    }

    /**
     * Get list tags in db
     *
     * @return mixed
     * @author Bytesoft
     */
    public function getAllTags()
    {
        return $this->tagRepository->pluck('name');
    }
}
