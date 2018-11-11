<?php

namespace Bytesoft\Product\Http\Controllers;

use Bytesoft\Base\Events\BeforeEditContentEvent;
use Bytesoft\Product\Http\Requests\ProductGroupRequest;
use Bytesoft\Product\Repositories\Interfaces\ProductGroupInterface;
use Bytesoft\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Bytesoft\Product\Tables\ProductGroupTable;
use Bytesoft\Base\Events\CreatedContentEvent;
use Bytesoft\Base\Events\DeletedContentEvent;
use Bytesoft\Base\Events\UpdatedContentEvent;
use Bytesoft\Base\Http\Responses\BaseHttpResponse;
use Bytesoft\Product\Forms\ProductGroupForm;
use Bytesoft\Base\Forms\FormBuilder;
use Auth;

class ProductGroupController extends BaseController
{
    /**
     * @var ProductGroupInterface
     */
    protected $productgroupRepository;

    /**
     * ProductController constructor.
     * @param ProductGroupInterface $productgroupRepository
     * @author Bytesoft
     */
    public function __construct(ProductGroupInterface $productgroupRepository)
    {
        $this->productgroupRepository = $productgroupRepository;
    }

    /**
     * Display all products
     * @param ProducGrouptTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn
     * @throws \Throwable
     */
    public function getList(ProductGroupTable $table)
    {

        page_title()->setTitle(trans('plugins.product::product.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn
     */
    public function getCreate(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins.product::product.create'));

        return $formBuilder->create(ProductGroupForm::class)->renderForm();
    }

    /**
     * Insert new Product into database
     *
     * @param ProductRequest $request
     * @return BaseHttpResponse
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn
     */
    public function postCreate(ProductGroupRequest $request, BaseHttpResponse $response)
    {
        $product = $this->productgroupRepository->createOrUpdate(array_merge($request->input(), [
            'user_id' => Auth::user()->getKey(),
            'featured' => $request->input('featured', false),
            'is_default' => $request->input('is_default', false),
        ]));

        event(new CreatedContentEvent(PRODUCT_GROUP_MODULE_SCREEN_NAME, $request, $product));

        return $response
            ->setPreviousUrl(route('product.groups.list'))
            ->setNextUrl(route('product.groups.edit', $product->id))
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
     * @website https://bytesoft.vn
     */
    public function getEdit($id, FormBuilder $formBuilder, Request $request)
    {
        $product = $this->productgroupRepository->findOrFail($id);

        event(new BeforeEditContentEvent(PRODUCT_GROUP_MODULE_SCREEN_NAME, $request, $product));

        page_title()->setTitle(trans('plugins.product::product.edit') . ' #' . $id);

        return $formBuilder->create(ProductGroupForm::class)->setModel($product)->renderForm();
    }

    /**
     * @param $id
     * @param ProductRequest $request
     * @return BaseHttpResponse
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn
     */
    public function postEdit($id, ProductGroupRequest $request, BaseHttpResponse $response)
    {
        $product = $this->productgroupRepository->findOrFail($id);

        $product->fill($request->input());
        $product->featured = $request->input('featured', false);
        $product->is_default = $request->input('is_default', false);

        $this->productgroupRepository->createOrUpdate($product);

        event(new UpdatedContentEvent(PRODUCT_GROUP_MODULE_SCREEN_NAME, $request, $product));

        return $response
            ->setPreviousUrl(route('product.groups.list'))
            ->setMessage(trans('core.base::notices.update_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return BaseHttpResponse
     * @author thuandc@bytesoft.net
     * @website https://bytesoft.vn
     */
    public function getDelete(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $product = $this->productgroupRepository->findOrFail($id);

            $this->productgroupRepository->delete($product);

            event(new DeletedContentEvent(PRODUCT_GROUP_MODULE_SCREEN_NAME, $request, $product));

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
            $product = $this->productgroupRepository->findOrFail($id);
            $this->productgroupRepository->delete($product);
            event(new DeletedContentEvent(PRODUCT_GROUP_MODULE_SCREEN_NAME, $request, $product));
        }

        return $response->setMessage(trans('core.base::notices.delete_success_message'));
    }
}
