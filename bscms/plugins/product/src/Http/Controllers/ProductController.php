<?php

namespace Bytesoft\Product\Http\Controllers;

use Bytesoft\Base\Events\BeforeEditContentEvent;
use Bytesoft\Product\Http\Requests\ProductRequest;
use Bytesoft\Product\Repositories\Interfaces\ProductInterface;
use Bytesoft\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Bytesoft\Product\Tables\ProductTable;
use Bytesoft\Base\Events\CreatedContentEvent;
use Bytesoft\Base\Events\DeletedContentEvent;
use Bytesoft\Base\Events\UpdatedContentEvent;
use Bytesoft\Base\Http\Responses\BaseHttpResponse;
use Bytesoft\Product\Forms\ProductForm;
use Bytesoft\Base\Forms\FormBuilder;

class ProductController extends BaseController
{
    /**
     * @var ProductInterface
     */
    protected $productRepository;

    /**
     * ProductController constructor.
     * @param ProductInterface $productRepository
     * @author Bytesoft
     */
    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display all products
     * @param ProductTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Bytesoft
     * @throws \Throwable
     */
    public function getList(ProductTable $table)
    {

        page_title()->setTitle(trans('plugins.product::product.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     * @author Bytesoft
     */
    public function getCreate(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins.product::product.create'));

        return $formBuilder->create(ProductForm::class)->renderForm();
    }

    /**
     * Insert new Product into database
     *
     * @param ProductRequest $request
     * @return BaseHttpResponse
     * @author Bytesoft
     */
    public function postCreate(ProductRequest $request, BaseHttpResponse $response)
    {
        $product = $this->productRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(PRODUCT_MODULE_SCREEN_NAME, $request, $product));

        return $response
            ->setPreviousUrl(route('product.list'))
            ->setNextUrl(route('product.edit', $product->id))
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
        $product = $this->productRepository->findOrFail($id);

        event(new BeforeEditContentEvent(PRODUCT_MODULE_SCREEN_NAME, $request, $product));

        page_title()->setTitle(trans('plugins.product::product.edit') . ' #' . $id);

        return $formBuilder->create(ProductForm::class)->setModel($product)->renderForm();
    }

    /**
     * @param $id
     * @param ProductRequest $request
     * @return BaseHttpResponse
     * @author Bytesoft
     */
    public function postEdit($id, ProductRequest $request, BaseHttpResponse $response)
    {
        $product = $this->productRepository->findOrFail($id);

        $product->fill($request->input());

        $this->productRepository->createOrUpdate($product);

        event(new UpdatedContentEvent(PRODUCT_MODULE_SCREEN_NAME, $request, $product));

        return $response
            ->setPreviousUrl(route('product.list'))
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
            $product = $this->productRepository->findOrFail($id);

            $this->productRepository->delete($product);

            event(new DeletedContentEvent(PRODUCT_MODULE_SCREEN_NAME, $request, $product));

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
            $product = $this->productRepository->findOrFail($id);
            $this->productRepository->delete($product);
            event(new DeletedContentEvent(PRODUCT_MODULE_SCREEN_NAME, $request, $product));
        }

        return $response->setMessage(trans('core.base::notices.delete_success_message'));
    }
}
