<?php

namespace Bytesoft\Slider\Http\Controllers;

use Bytesoft\Slider\Http\Requests\SliderRequest;
use Bytesoft\Slider\Repositories\Interfaces\SliderInterface;
use Bytesoft\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use MongoDB\Driver\Exception\Exception;
use Bytesoft\Slider\Tables\SliderTable;
use Bytesoft\Base\Events\CreatedContentEvent;
use Bytesoft\Base\Events\DeletedContentEvent;
use Bytesoft\Base\Events\UpdatedContentEvent;
use Bytesoft\Base\Http\Responses\BaseHttpResponse;
use Bytesoft\Slider\Forms\SliderForm;
use Bytesoft\Base\Forms\FormBuilder;

class SliderController extends BaseController
{
    /**
     * @var SliderInterface
     */
    protected $sliderRepository;

    /**
     * SliderController constructor.
     * @param SliderInterface $sliderRepository
     * @author Sang Nguyen
     */
    public function __construct(SliderInterface $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;
    }

    /**
     * Display all sliders
     * @param SliderTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Sang Nguyen
     * @throws \Throwable
     */
    public function getList(SliderTable $table)
    {

        page_title()->setTitle(trans('plugins.slider::slider.list'));

        return $table->renderTable(['title' => trans('plugins.slider::slider.list')]);
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     * @author Sang Nguyen
     */
    public function getCreate(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins.slider::slider.create'));

        return $formBuilder->create(SliderForm::class)->renderForm();
    }

    /**
     * Insert new Slider into database
     *
     * @param SliderRequest $request
     * @return BaseHttpResponse
     * @author Sang Nguyen
     */
    public function postCreate(SliderRequest $request, BaseHttpResponse $response)
    {
        $slider = $this->sliderRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(SLIDER_MODULE_SCREEN_NAME, $request, $slider));

        return $response
            ->setPreviousUrl(route('slider.list'))
            ->setNextUrl(route('slider.edit', $slider->id))
            ->setMessage(trans('core.base::notices.create_success_message'));
    }

    /**
     * Show edit form
     *
     * @param $id
     * @param FormBuilder $formBuilder
     * @return string
     * @author Sang Nguyen
     */
    public function getEdit($id, FormBuilder $formBuilder)
    {
        $slider = $this->sliderRepository->findOrFail($id);

        page_title()->setTitle(trans('plugins.slider::slider.edit') . ' #' . $id);

        return $formBuilder->create(SliderForm::class)->setModel($slider)->renderForm();
    }

    /**
     * @param $id
     * @param SliderRequest $request
     * @return BaseHttpResponse
     * @author Sang Nguyen
     */
    public function postEdit($id, SliderRequest $request, BaseHttpResponse $response)
    {
        $slider = $this->sliderRepository->findOrFail($id);

        $slider->fill($request->input());

        $this->sliderRepository->createOrUpdate($slider);

        event(new UpdatedContentEvent(SLIDER_MODULE_SCREEN_NAME, $request, $slider));

        return $response
            ->setPreviousUrl(route('slider.list'))
            ->setMessage(trans('core.base::notices.update_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return BaseHttpResponse
     * @author Sang Nguyen
     */
    public function getDelete(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $slider = $this->sliderRepository->findOrFail($id);

            $this->sliderRepository->delete($slider);

            event(new DeletedContentEvent(SLIDER_MODULE_SCREEN_NAME, $request, $slider));

            return $response->setMessage(trans('core.base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response->setError(true)->setMessage(trans('core.base::notices.cannot_delete'));
        }
    }

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @author Sang Nguyen
     */
    public function postDeleteMany(Request $request, BaseHttpResponse $response)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return $response->setError(true)->setMessage(trans('core.base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $slider = $this->sliderRepository->findOrFail($id);
            $this->sliderRepository->delete($slider);
            event(new DeletedContentEvent(SLIDER_MODULE_SCREEN_NAME, $request, $slider));
        }

        return $response->setMessage(trans('core.base::notices.delete_success_message'));
    }
}
