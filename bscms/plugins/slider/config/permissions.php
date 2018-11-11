<?php

return [
    [
        'name' => 'Slider',
        'flag' => 'slider.list',
    ],
    [
        'name' => 'Create',
        'flag' => 'slider.create',
        'parent_flag' => 'slider.list',
    ],
    [
        'name' => 'Edit',
        'flag' => 'slider.edit',
        'parent_flag' => 'slider.list',
    ],
    [
        'name' => 'Delete',
        'flag' => 'slider.delete',
        'parent_flag' => 'slider.list',
    ],
];