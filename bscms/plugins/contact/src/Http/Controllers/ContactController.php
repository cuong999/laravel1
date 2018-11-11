<?php

namespace Bytesoft\Contact\Http\Controllers;

use Bytesoft\Base\Forms\FormBuilder;
use Bytesoft\Base\Http\Controllers\BaseController;
use Bytesoft\Base\Http\Responses\BaseHttpResponse;
use Bytesoft\Contact\Forms\ContactForm;
use Bytesoft\Contact\Tables\ContactTable;
use Bytesoft\Contact\Repositories\Interfaces\ContactInterface;
use Exception;
use Illuminate\Http\Request;
use Bytesoft\Base\Events\DeletedContentEvent;
use Bytesoft\Base\Events\UpdatedContentEvent;

class ContactController extends BaseController
{

    /**
     * @var ContactInterface
     */
    protected $contactRepository;

    /**
     * @param ContactInterface $contactRepository
     * @author Bytesoft
     */
    public function __construct(ContactInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    /**
     * @param ContactTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Bytesoft
     * @throws \Throwable
     */
    public function getList(ContactTable $dataTable)
    {
        page_title()->setTitle(trans('plugins.contact::contact.menu'));

        return $dataTable->renderTable();
    }

    /**
     * @param $id
     * @param FormBuilder $formBuilder
     * @return string
     * @author Bytesoft
     */
    public function getEdit($id, FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins.contact::contact.edit'));

        $contact = $this->contactRepository->findById($id);

        $contact->is_read = true;
        $this->contactRepository->createOrUpdate($contact);

        return $formBuilder->create(ContactForm::class)->setModel($contact)->renderForm();
    }

    /**
     * @param $id
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @author Bytesoft
     */
    public function postEdit($id, Request $request, BaseHttpResponse $response)
    {
        $contact = $this->contactRepository->findById($id);

        if (!$request->input('is_read')) {
            $contact->is_read = false;
        } else {
            $contact->is_read = true;
        }

        $this->contactRepository->createOrUpdate($contact);
        event(new UpdatedContentEvent(CONTACT_MODULE_SCREEN_NAME, $request, $contact));

        return $response
            ->setPreviousUrl(route('contacts.list'))
            ->setMessage(trans('core.base::notices.update_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @author Bytesoft
     */
    public function getDelete($id, Request $request, BaseHttpResponse $response)
    {
        try {
            $contact = $this->contactRepository->findById($id);
            $this->contactRepository->delete($contact);
            event(new DeletedContentEvent(CONTACT_MODULE_SCREEN_NAME, $request, $contact));
            return $response->setMessage(trans('plugins.contact::contact.deleted'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage(trans('plugins.contact::contact.cannot_delete'));
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
                ->setMessage(trans('plugins.contact::contact.notices.no_select'));
        }

        foreach ($ids as $id) {
            $contact = $this->contactRepository->findOrFail($id);
            $this->contactRepository->delete($contact);
            event(new DeletedContentEvent(CONTACT_MODULE_SCREEN_NAME, $request, $contact));
        }

        return $response
            ->setData($request->input('status'))
            ->setMessage(trans('plugins.contact::contact.deleted'));
    }
}