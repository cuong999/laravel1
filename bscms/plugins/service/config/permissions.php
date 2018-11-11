<?php

return [
    [
        'name' => 'Service',
        'flag' => 'service.list',
    ],
    [
        'name' => 'Create',
        'flag' => 'service.create',
        'parent_flag' => 'service.list',
    ],
    [
        'name' => 'Edit',
        'flag' => 'service.edit',
        'parent_flag' => 'service.list',
    ],
    [
        'name' => 'Delete',
        'flag' => 'service.delete',
        'parent_flag' => 'service.list',
    ],
];