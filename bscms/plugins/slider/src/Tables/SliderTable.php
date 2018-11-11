<?php

namespace Bytesoft\Slider\Tables;

use Bytesoft\Slider\Repositories\Interfaces\SliderInterface;
use Bytesoft\Table\Abstracts\TableAbstract;
use Illuminate\Contracts\Routing\UrlGenerator;
use Yajra\DataTables\DataTables;

class SliderTable extends TableAbstract
{

    /**
     * @var bool
     */
    protected $has_actions = true;

    /**
     * @var bool
     */
    protected $has_configuration = true;

    /**
     * @var bool
     */
    protected $has_filter = true;

    /**
     * TagTable constructor.
     * @param DataTables $table
     * @param UrlGenerator $urlGenerator
     * @param SliderInterface $sliderRepository
     */
    public function __construct(DataTables $table, UrlGenerator $urlGenerator, SliderInterface $sliderRepository)
    {
        $this->repository = $sliderRepository;
        $this->setOption('id', 'table-plugins-slider');
        parent::__construct($table, $urlGenerator);
    }

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     * @author Sang Nguyen
     * @since 2.1
     */
    public function ajax()
    {
        $data = $this->table
            ->eloquent($this->query())
            ->editColumn('name', function ($item) {
                return anchor_link(route('slider.edit', $item->id), $item->name);
            })
            ->editColumn('checkbox', function ($item) {
                return table_checkbox($item->id);
            })
            ->editColumn('created_at', function ($item) {
                return date_from_database($item->created_at, config('core.base.general.date_format.date'));
            })
            ->editColumn('status', function ($item) {
                return table_status($item->status);
            });

        return apply_filters(BASE_FILTER_GET_LIST_DATA, $data, SLIDER_MODULE_SCREEN_NAME)
            ->addColumn('operations', function ($item) {
                return table_actions('slider.edit', 'slider.delete', $item);
            })
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * Get the query object to be processed by table.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     * @author Sang Nguyen
     * @since 2.1
     */
    public function query()
    {
        $model = $this->repository->getModel();
        $query = $model->select(['sliders.id', 'sliders.name','sliders.title','sliders.description','sliders.image', 'sliders.created_at', 'sliders.status']);
        return $this->applyScopes(apply_filters(BASE_FILTER_TABLE_QUERY, $query, $model, SLIDER_MODULE_SCREEN_NAME));
    }

    /**
     * @return array
     * @author Sang Nguyen
     * @since 2.1
     */
    public function columns()
    {
        return [
            'id' => [
                'name' => 'sliders.id',
                'title' => trans('core.base::tables.id'),
                'width' => '20px',
            ],
            'name' => [
                'name' => 'sliders.name',
                'title' => trans('core.base::tables.name'),
                'class' => 'text-left',
            ],
            'title' => [
                'name' => 'sliders.title',
                'title' => trans('core.base::tables.title'),
                'class' => 'text-left',
            ],
            'description' => [
                'name' => 'sliders.description',
                'title' => trans('core.base::tables.description'),
                'class' => 'text-left',
            ],
            'created_at' => [
                'name' => 'sliders.created_at',
                'title' => trans('core.base::tables.created_at'),
                'width' => '100px',
            ],
            'status' => [
                'name' => 'sliders.status',
                'title' => trans('core.base::tables.status'),
                'width' => '100px',
            ],
        ];
    }

    /**
     * @return array
     * @author Sang Nguyen
     * @since 2.1
     * @throws \Throwable
     */
    public function buttons()
    {
        $buttons = [
            'create' => [
                'link' => route('slider.create'),
                'text' => view('core.base::elements.tables.actions.create')->render(),
            ],
        ];
        return apply_filters(BASE_FILTER_TABLE_BUTTONS, $buttons, SLIDER_MODULE_SCREEN_NAME);
    }

    /**
     * @return array
     * @throws \Throwable
     */
    public function bulkActions(): array
    {
        $actions = parent::bulkActions();

        $actions['delete-many'] = view('core.table::partials.delete', [
            'href' => route('slider.delete.many'),
            'data_class' => get_class($this),
        ]);

        return $actions;
    }

    /**
     * @return mixed
     */
    public function getBulkChanges(): array
    {
        return [
            'sliders.name' => [
                'title' => trans('core.base::tables.name'),
                'type' => 'text',
                'validate' => 'required|max:120',
                'callback' => 'getNames',
            ],
            'sliders.status' => [
                'title' => trans('core.base::tables.status'),
                'type' => 'select',
                'choices' => [
                    0 => trans('core.base::tables.deactivate'),
                    1 => trans('core.base::tables.activate'),
                ],
                'validate' => 'required|in:0,1',
            ],
            'sliders.created_at' => [
                'title' => trans('core.base::tables.created_at'),
                'type' => 'date',
            ],
        ];
    }

    /**
     * @return array
     */
    public function getNames()
    {
        return $this->repository->pluck('sliders.name', 'sliders.id');
    }
}
