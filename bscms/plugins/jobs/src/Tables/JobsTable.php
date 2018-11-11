<?php

namespace Bytesoft\Jobs\Tables;

use Bytesoft\Jobs\Repositories\Interfaces\JobsInterface;
use Bytesoft\Table\Abstracts\TableAbstract;
use Illuminate\Contracts\Routing\UrlGenerator;
use Yajra\DataTables\DataTables;

class JobsTable extends TableAbstract
{

    /**
     * @var bool
     */
    protected $has_actions = true;

    /**
     * @var bool
     */
    protected $has_filter = true;

    /**
     * TagTable constructor.
     * @param DataTables $table
     * @param UrlGenerator $urlGenerator
     * @param JobsInterface $jobsRepository
     */
    public function __construct(DataTables $table, UrlGenerator $urlGenerator, JobsInterface $jobsRepository)
    {
        $this->repository = $jobsRepository;
        $this->setOption('id', 'table-plugins-jobs');
        parent::__construct($table, $urlGenerator);
    }

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     * @author Bytesoft
     * @since 2.1
     */
    public function ajax()
    {
        $data = $this->table
            ->eloquent($this->query())
            ->editColumn('name', function ($item) {
                return anchor_link(route('jobs.edit', $item->id), $item->name);
            })
            ->editColumn('description', function ($item) {
                return anchor_link(route('jobs.edit', $item->id), $item->name);
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

        return apply_filters(BASE_FILTER_GET_LIST_DATA, $data, JOBS_MODULE_SCREEN_NAME)
            ->addColumn('operations', function ($item) {
                return table_actions('jobs.edit', 'jobs.delete', $item);
            })
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * Get the query object to be processed by table.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     * @author Bytesoft
     * @since 2.1
     */
    public function query()
    {
        $model = $this->repository->getModel();
        $query = $model->select(['jobs.id', 'jobs.name', 'jobs.created_at', 'jobs.status']);
        return $this->applyScopes(apply_filters(BASE_FILTER_TABLE_QUERY, $query, $model, JOBS_MODULE_SCREEN_NAME));
    }

    /**
     * @return array
     * @author Bytesoft
     * @since 2.1
     */
    public function columns()
    {
        return [
            'id' => [
                'name' => 'jobs.id',
                'title' => trans('core.base::tables.id'),
                'width' => '20px',
            ],
            'name' => [
                'name' => 'jobs.name',
                'title' => trans('core.base::tables.name'),
                'class' => 'text-left',
            ],
            'expiration_at' => [
                'name' => 'jobs.expiration_at',
                'title' => 'Expiration at',
                'width' => '100px',
            ],
            'created_at' => [
                'name' => 'jobs.created_at',
                'title' => trans('core.base::tables.created_at'),
                'width' => '100px',
            ],
            'status' => [
                'name' => 'jobs.status',
                'title' => trans('core.base::tables.status'),
                'width' => '100px',
            ],
        ];
    }

    /**
     *
     * Create Button create Jobs
     *
     * @return array
     * @author thuandc@bytesoft.net
     * @website bytesoft.vn
     * @since 2.1
     * @throws \Throwable
     */
    public function buttons()
    {
        $buttons = [
            'create' => [
                'link' => route('jobs.create'),
                'text' => view('core.base::elements.tables.actions.create')->render(),
            ],
        ];
        return apply_filters(BASE_FILTER_TABLE_BUTTONS, $buttons, JOBS_MODULE_SCREEN_NAME);
    }

    /**
     * @return array
     * @throws \Throwable
     */
    public function bulkActions(): array
    {
        $actions = parent::bulkActions();

        $actions['delete-many'] = view('core.table::partials.delete', [
            'href' => route('jobs.delete.many'),
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
            'jobs.name' => [
                'title' => trans('core.base::tables.name'),
                'type' => 'text',
                'validate' => 'required|max:120',
                'callback' => 'getNames',
            ],
            'jobs.status' => [
                'title' => trans('core.base::tables.status'),
                'type' => 'select',
                'choices' => [
                    0 => trans('core.base::tables.deactivate'),
                    1 => trans('core.base::tables.activate'),
                ],
                'validate' => 'required|in:0,1',
            ],
            'jobs.created_at' => [
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
        return $this->repository->pluck('jobs.name', 'jobs.id');
    }
}
