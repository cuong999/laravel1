<?php

namespace Bytesoft\Contacts\Repositories\Eloquent;

use Bytesoft\Support\Repositories\Eloquent\RepositoriesAbstract;
use Bytesoft\Contacts\Repositories\Interfaces\ContactsInterface;

class ContactsRepository extends RepositoriesAbstract implements ContactsInterface
{
    /**
     * @var string
     */
    protected $screen = CONTACTS_MODULE_SCREEN_NAME;
}
