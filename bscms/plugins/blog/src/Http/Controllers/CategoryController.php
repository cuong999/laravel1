<?php

namespace Bytesoft\Blog\Http\Controllers;

use Bytesoft\Base\Events\BeforeEditContentEvent;
use Bytesoft\Base\Forms\FormBuilder;
use Bytesoft\Base\Http\Controllers\BaseController;
use Bytesoft\Base\Http\Responses\BaseHttpResponse;
use Bytesoft\Blog\Forms\CategoryForm;
use Bytesoft\Blog\Tables\CategoryTable;
use Bytesoft\Blog\Http\Requests\CategoryRequest;
use Bytesoft\Blog\Repositories\Interfaces\CategoryInterface;
use Exception;
use Illuminate\Http\Request;
use Auth;
use Bytesoft\Base\Events\CreatedContentEvent;
use Bytesoft\Base\Events\DeletedContentEvent;
use Bytesoft\Base\Events\UpdatedContentEvent;

class CategoryController extends BaseController
{

    /**
     * @var CategoryInterface
     */
    protected $categoryRepository;

    /**
     * @param CategoryInterface $categoryRepository
     * @author Bytesoft
     */
    public function __construct(CategoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display all categories
     * @param CategoryTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Bytesoft
     * @throws \Throwable
     */
    public function getList(CategoryTable $dataTable)
    {
        page_title()->setTitle(trans('plugins.blog::categories.menu'));

        return $dataTable->renderTable();
    }

    /**
     * Show create form
     * @param FormBuilder $formBuilder
     * @return string
     * @author Bytesoft
     */
    public function getCreate(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins.blog::categories.create'));

        return $formBuilder->create(CategoryForm::class)->renderForm();
    }

    /**
     * Insert new Category into database
     *
     * @param CategoryRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @author Bytesoft
     */
    public function postCreate(CategoryRequest $request, BaseHttpResponse $response)
    {
        $category = $this->categoryRepository->createOrUpdate(array_merge($request->input(), [
            'user_id' => Auth::user()->getKey(),
            'featured' => $request->input('featured', false),
            'is_default' => $request->input('is_default', false),
        ]));

        event(new CreatedContentEvent(CATEGORY_MODULE_SCREEN_NAME, $request, $category));

        return $response->setPreviousUrl(route('categories.list'))
            ->setNextUrl(route('categories.edit', $category->id))
            ->setMessage(trans('core.base::notices.create_success_message'));
    }

    /**
     * Show edit form
     *
     * @param int $id
     * @return string
     * @author Bytesoft
     */
    public function getEdit($id, FormBuilder $formBuilder)
    {
        $category = $this->categoryRepository->findOrFail($id);

        event(new BeforeEditContentEvent(CATEGORY_MODULE_SCREEN_NAME, request(), $category));

        page_title()->setTitle(trans('plugins.blog::categories.edit') . ' #' . $id);

        return $formBuilder->create(CategoryForm::class)->setModel($category)->renderForm();
    }

    /**
     * @param int $id
     * @param CategoryRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @author Bytesoft
     */
    public function postEdit($id, CategoryRequest $request, BaseHttpResponse $response)
    {
        $category = $this->categoryRepository->findOrFail($id);

        $category->fill($request->input());
        $category->featured = $request->input('featured', false);
        $category->is_default = $request->input('is_default', false);

        $this->categoryRepository->createOrUpdate($category);

        event(new UpdatedContentEvent(CATEGORY_MODULE_SCREEN_NAME, $request, $category));

        return $response
            ->setPreviousUrl(route('categories.list'))
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
            $category = $this->categoryRepository->findOrFail($id);

            if (!$category->is_default) {
                $this->categoryRepository->delete($category);
                event(new DeletedContentEvent(CATEGORY_MODULE_SCREEN_NAME, $request, $category));
            }

            return $response->setMessage(trans('core.base::notices.delete_success_message'));
        } catch (Exception $ex) {
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
            return $response->setMessage(trans('core.base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $category = $this->categoryRepository->findOrFail($id);
            if (!$category->is_default) {
                $this->categoryRepository->delete($category);

                event(new DeletedContentEvent(CATEGORY_MODULE_SCREEN_NAME, $request, $category));
            }
        }

        return $response->setMessage(trans('core.base::notices.delete_success_message'));
    }
}
