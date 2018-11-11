<?php

namespace Bytesoft\Contacts\Http\Controllers;

use Bytesoft\Base\Events\BeforeEditContentEvent;
use Bytesoft\Contacts\Http\Requests\ContactsRequest;
use Bytesoft\Contacts\Repositories\Interfaces\ContactsInterface;
use Bytesoft\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Bytesoft\Contacts\Tables\ContactsTable;
use Bytesoft\Base\Events\CreatedContentEvent;
use Bytesoft\Base\Events\DeletedContentEvent;
use Bytesoft\Base\Events\UpdatedContentEvent;
use Bytesoft\Base\Http\Responses\BaseHttpResponse;
use Bytesoft\Contacts\Forms\ContactsForm;
use Bytesoft\Base\Forms\FormBuilder;
use App\Http\Requests;
use Validator;
use Bytesoft\Contacts\Models\Contacts;
use Illuminate\Support\MessageBag;



class ContactsController extends BaseController
{
    /**
     * @var ContactsInterface
     */
    protected $contactsRepository;

    /**
     * ContactsController constructor.
     * @param ContactsInterface $contactsRepository
     * @author Bytesoft
     */
    public function __construct(ContactsInterface $contactsRepository)
    {
        $this->contactsRepository = $contactsRepository;
    }

    /**
     * Display all contacts
     * @param ContactsTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Bytesoft
     * @throws \Throwable
     */
    public function getList(ContactsTable $table)
    {

        page_title()->setTitle(trans('plugins.contacts::contacts.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     * @author Bytesoft
     */
    public function getCreate(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins.contacts::contacts.create'));

        return $formBuilder->create(ContactsForm::class)->renderForm();
    }

    /**
     * Insert new Contacts into database
     *
     * @param ContactsRequest $request
     * @return BaseHttpResponse
     * @author Bytesoft
     */
    public function postCreate(ContactsRequest $request, BaseHttpResponse $response)
    {
        $contacts = $this->contactsRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(CONTACTS_MODULE_SCREEN_NAME, $request, $contacts));

        return $response
            ->setPreviousUrl(route('contacts.list'))
            ->setNextUrl(route('contacts.edit', $contacts->id))
            ->setMessage(trans('core.base::notices.create_success_message'));
    }

    /**
     * Show edit form
     *
     * @param $id
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return string
     * @author Bytesoft
     */
    public function getEdit($id, FormBuilder $formBuilder, Request $request)
    {
        $contacts = $this->contactsRepository->findOrFail($id);

        event(new BeforeEditContentEvent(CONTACTS_MODULE_SCREEN_NAME, $request, $contacts));

        page_title()->setTitle(trans('plugins.contacts::contacts.edit') . ' #' . $id);

        return $formBuilder->create(ContactsForm::class)->setModel($contacts)->renderForm();
    }

    /**
     * @param $id
     * @param ContactsRequest $request
     * @return BaseHttpResponse
     * @author Bytesoft
     */
    public function postEdit($id, ContactsRequest $request, BaseHttpResponse $response)
    {
        $contacts = $this->contactsRepository->findOrFail($id);

        $contacts->fill($request->input());

        $this->contactsRepository->createOrUpdate($contacts);

        event(new UpdatedContentEvent(CONTACTS_MODULE_SCREEN_NAME, $request, $contacts));

        return $response
            ->setPreviousUrl(route('contacts.list'))
            ->setMessage(trans('core.base::notices.update_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return BaseHttpResponse
     * @author Bytesoft
     */
    public function getDelete(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $contacts = $this->contactsRepository->findOrFail($id);

            $this->contactsRepository->delete($contacts);

            event(new DeletedContentEvent(CONTACTS_MODULE_SCREEN_NAME, $request, $contacts));

            return $response->setMessage(trans('core.base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage(trans('core.base::notices.cannot_delete'));
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
                ->setMessage(trans('core.base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $contacts = $this->contactsRepository->findOrFail($id);
            $this->contactsRepository->delete($contacts);
            event(new DeletedContentEvent(CONTACTS_MODULE_SCREEN_NAME, $request, $contacts));
        }

        return $response->setMessage(trans('core.base::notices.delete_success_message'));
    }
    public function addContact(Request $request)
    {
            $rules = [
            'email' =>'required|email',
            'name' => 'required',
            'message'=> 'required',
            'theme' => 'required',

        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'message.required' => 'Tin Nhắn là trường bắt buộc',
            'theme.required' => 'Chủ Đề  là trường bắt buộc',
            'name.required' => 'Tên là trường bắt buộc',
            
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect('/lien-he')->withErrors($validator)->withInput();
        } 
        else {
            $contact = new Contacts();
            $contact->name    = $request->input('name');
            $contact->email   = $request->input('email');
            $contact->theme   = $request->input('theme');
            $contact->message = $request->input('message');
            $contact->save();
            return redirect('lien-he')->with('success', 'Gửi thành công');

        }
        
    }
}
