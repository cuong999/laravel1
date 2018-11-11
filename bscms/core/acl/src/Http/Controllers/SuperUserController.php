<?php

namespace Bytesoft\ACL\Http\Controllers;

use Auth;
use Bytesoft\ACL\Forms\SuperUserForm;
use Bytesoft\ACL\Tables\SuperUserTable;
use Bytesoft\ACL\Repositories\Interfaces\UserInterface;
use Bytesoft\Base\Forms\FormBuilder;
use Bytesoft\Base\Http\Controllers\BaseController;
use Bytesoft\Base\Http\Responses\BaseHttpResponse;
use Exception;
use Illuminate\Http\Request;

class SuperUserController extends BaseController
{
    /**
     * @var UserInterface
     */
    protected $userRepository;

    /**
     * SuperUserController constructor.
     * @param UserInterface $userRepository
     */
    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    /**
     * @param SuperUserTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Bytesoft
     * @throws \Throwable
     */
    public function getList(SuperUserTable $dataTable)
    {
        page_title()->setTitle(trans('core.acl::permissions.super_user_management'));

        return $dataTable->renderTable();
    }

    /**
     * @param int $id
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @author Bytesoft
     */
    public function getDelete($id, BaseHttpResponse $response)
    {
        if (Auth::user()->getKey() == $id) {
            return $response
                ->setError()
                ->setMessage(trans('core.base::system.cannot_revoke_yourself'));
        }

        try {
            $user = $this->userRepository->findById($id);
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage(trans('core.base::system.cannot_find_user'));
        }
        $user->updatePermission('superuser', false);
        $user->updatePermission('manage_supers', false);
        $user->super_user = 0;
        $user->manage_supers = 0;
        $this->userRepository->createOrUpdate($user);
        return $response->setMessage(trans('core.base::system.supper_revoked'));
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
                ->setMessage(trans('core.base::system.no_select'));
        }

        foreach ($ids as $id) {
            if (Auth::user()->getKey() == $id) {
                return $response
                    ->setError()
                    ->setMessage(trans('core.base::system.cannot_revoke_yourself'));
            }
            $user = $this->userRepository->findOrFail($id);
            $user->updatePermission('superuser', false);
            $user->updatePermission('manage_supers', false);
            $user->super_user = 0;
            $user->manage_supers = 0;
            $this->userRepository->createOrUpdate($user);
        }
        return $response->setMessage(trans('core.base::system.supper_revoked'));
    }

    /**
     * @return string
     * @author Bytesoft
     */
    public function getCreate(FormBuilder $formBuilder)
    {
        return $formBuilder->create(SuperUserForm::class)->renderForm();
    }

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @author Bytesoft
     */
    public function postCreate(Request $request, BaseHttpResponse $response)
    {
        try {
            $user = $this->userRepository->getFirstBy(['email' => $request->input('email')]);
            if (!empty($user)) {
                $user->updatePermission('superuser', true);
                $user->super_user = 1;
                $this->userRepository->createOrUpdate($user);
                return $response
                    ->setNextUrl(route('users-supers.list'))
                    ->setMessage(trans('core.base::system.supper_granted'));
            }
            return $response
                ->setError()
                ->withInput()
                ->setNextUrl(route('users-supers.list'))
                ->setMessage(trans('core.base::system.cant_find_user_with_email'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->withInput()
                ->setNextUrl(route('users-supers.list'))
                ->setMessage($exception->getMessage());
        }
    }
}
