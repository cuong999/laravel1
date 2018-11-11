<?php

return [
    [
        'name' => 'Svprocess',
        'flag' => 'svprocess.list',
    ],
    [
        'name' => 'Create',
        'flag' => 'svprocess.create',
        'parent_flag' => 'svprocess.list',
    ],
    [
        'name' => 'Edit',
        'flag' => 'svprocess.edit',
        'parent_flag' => 'svprocess.list',
    ],
    [
        'name' => 'Delete',
        'flag' => 'svprocess.delete',
        'parent_flag' => 'svprocess.list',
    ],
];