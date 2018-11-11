<?php

namespace Bytesoft\Review\Http\Controllers;

use Bytesoft\Base\Events\BeforeEditContentEvent;
use Bytesoft\Review\Http\Requests\ReviewRequest;
use Bytesoft\Review\Repositories\Interfaces\ReviewInterface;
use Bytesoft\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Bytesoft\Review\Tables\ReviewTable;
use Bytesoft\Base\Events\CreatedContentEvent;
use Bytesoft\Base\Events\DeletedContentEvent;
use Bytesoft\Base\Events\UpdatedContentEvent;
use Bytesoft\Base\Http\Responses\BaseHttpResponse;
use Bytesoft\Review\Forms\ReviewForm;
use Bytesoft\Base\Forms\FormBuilder;

class ReviewController extends BaseController
{
    /**
     * @var ReviewInterface
     */
    protected $reviewRepository;

    /**
     * ReviewController constructor.
     * @param ReviewInterface $reviewRepository
     * @author Bytesoft
     */
    public function __construct(ReviewInterface $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    /**
     * Display all reviews
     * @param ReviewTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Bytesoft
     * @throws \Throwable
     */
    public function getList(ReviewTable $table)
    {

        page_title()->setTitle(trans('plugins.review::review.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     * @author Bytesoft
     */
    public function getCreate(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins.review::review.create'));

        return $formBuilder->create(ReviewForm::class)->renderForm();
    }

    /**
     * Insert new Review into database
     *
     * @param ReviewRequest $request
     * @return BaseHttpResponse
     * @author Bytesoft
     */
    public function postCreate(ReviewRequest $request, BaseHttpResponse $response)
    {
        $review = $this->reviewRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(REVIEW_MODULE_SCREEN_NAME, $request, $review));

        return $response
            ->setPreviousUrl(route('review.list'))
            ->setNextUrl(route('review.edit', $review->id))
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
        $review = $this->reviewRepository->findOrFail($id);

        event(new BeforeEditContentEvent(REVIEW_MODULE_SCREEN_NAME, $request, $review));

        page_title()->setTitle(trans('plugins.review::review.edit') . ' #' . $id);

        return $formBuilder->create(ReviewForm::class)->setModel($review)->renderForm();
    }

    /**
     * @param $id
     * @param ReviewRequest $request
     * @return BaseHttpResponse
     * @author Bytesoft
     */
    public function postEdit($id, ReviewRequest $request, BaseHttpResponse $response)
    {
        $review = $this->reviewRepository->findOrFail($id);

        $review->fill($request->input());

        $this->reviewRepository->createOrUpdate($review);

        event(new UpdatedContentEvent(REVIEW_MODULE_SCREEN_NAME, $request, $review));

        return $response
            ->setPreviousUrl(route('review.list'))
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
            $review = $this->reviewRepository->findOrFail($id);

            $this->reviewRepository->delete($review);

            event(new DeletedContentEvent(REVIEW_MODULE_SCREEN_NAME, $request, $review));

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
            $review = $this->reviewRepository->findOrFail($id);
            $this->reviewRepository->delete($review);
            event(new DeletedContentEvent(REVIEW_MODULE_SCREEN_NAME, $request, $review));
        }

        return $response->setMessage(trans('core.base::notices.delete_success_message'));
    }
}
