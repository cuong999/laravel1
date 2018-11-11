<?php

return [
    [
        'name' => 'Jobs',
        'flag' => 'jobs.list',
    ],
    [
        'name' => 'Create',
        'flag' => 'jobs.create',
        'parent_flag' => 'jobs.list',
    ],
    [
        'name' => 'Edit',
        'flag' => 'jobs.edit',
        'parent_flag' => 'jobs.list',
    ],
    [
        'name' => 'Delete',
        'flag' => 'jobs.delete',
        'parent_flag' => 'jobs.list',
    ],
];