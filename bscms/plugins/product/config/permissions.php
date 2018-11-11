<?php

return [
    [
        'name' => 'Product',
        'flag' => 'plugins.product',
    ],
    [
        'name' => 'Product',
        'flag' => 'product.list',
        'parent_flag' => 'plugins.product',
    ],
    [
        'name' => 'Create',
        'flag' => 'product.create',
        'parent_flag' => 'product.list',
    ],
    [
        'name' => 'Edit',
        'flag' => 'product.edit',
        'parent_flag' => 'product.list',
    ],
    [
        'name' => 'Delete',
        'flag' => 'product.delete',
        'parent_flag' => 'product.list',
    ],
    [
        'name' => 'Product Group',
        'flag' => 'product.groups',
        'parent_flag' => 'plugins.product',
    ],
    [
        'name' => 'Create',
        'flag' => 'product.groups.create',
        'parent_flag' => 'product.group',
    ],
    [
        'name' => 'Edit',
        'flag' => 'product.groups.edit',
        'parent_flag' => 'product.groups',
    ],
    [
        'name' => 'Delete',
        'flag' => 'product.groups.delete',
        'parent_flag' => 'product.groups',
    ],
];