<?php

namespace Bytesoft\Member\Http\Controllers;

use Assets;
use Bytesoft\Base\Forms\FormBuilder;
use Bytesoft\Base\Http\Controllers\BaseController;
use Bytesoft\Base\Http\Responses\BaseHttpResponse;
use Bytesoft\Member\Forms\MemberForm;
use Bytesoft\Member\Tables\MemberTable;
use Bytesoft\Member\Http\Requests\MemberCreateRequest;
use Bytesoft\Member\Http\Requests\MemberEditRequest;
use Bytesoft\Member\Repositories\Interfaces\MemberInterface;
use Exception;
use Illuminate\Http\Request;
use Bytesoft\Base\Events\CreatedContentEvent;
use Bytesoft\Base\Events\DeletedContentEvent;
use Bytesoft\Base\Events\UpdatedContentEvent;

class MemberController extends BaseController
{

    /**
     * @var MemberInterface
     */
    protected $memberRepository;

    /**
     * @param MemberInterface $memberRepository
     * @author Bytesoft
     */
    public function __construct(MemberInterface $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    /**
     * Display all members
     * @param MemberTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Bytesoft
     * @throws \Throwable
     */
    public function getList(MemberTable $dataTable)
    {
        page_title()->setTitle(trans('plugins.member::member.menu_name'));

        return $dataTable->renderTable();
    }

    /**
     * Show create form
     * @param FormBuilder $formBuilder
     * @return string
     * @author Bytesoft
     */
    public function getCreate(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins.member::member.create'));

        Assets::addJavascriptDirectly(['/vendor/core/plugins/member/js/member-admin.js']);

        return $formBuilder
            ->create(MemberForm::class)
            ->remove('is_change_password')
            ->renderForm();
    }

    /**
     * Insert new Gallery into database
     *
     * @param MemberCreateRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @author Bytesoft
     */
    public function postCreate(MemberCreateRequest $request, BaseHttpResponse $response)
    {
        $request->merge(['password' => bcrypt($request->input('password'))]);
        $member = $this->memberRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(MEMBER_MODULE_SCREEN_NAME, $request, $member));

        return $response
            ->setPreviousUrl(route('member.list'))
            ->setNextUrl(route('member.edit', $member->id))
            ->setMessage(trans('core.base::notices.create_success_message'));
    }

    /**
     * Show edit form
     *
     * @param $id
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     * @author Bytesoft
     */
    public function getEdit($id, FormBuilder $formBuilder)
    {
        Assets::addJavascriptDirectly(['/vendor/core/plugins/member/js/member-admin.js']);

        $member = $this->memberRepository->findOrFail($id);
        page_title()->setTitle(trans('plugins.member::member.edit'));

        $member->password = null;

        return $formBuilder
            ->create(MemberForm::class)
            ->setModel($member)
            ->renderForm();
    }

    /**
     * @param $id
     * @param MemberEditRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @author Bytesoft
     */
    public function postEdit($id, MemberEditRequest $request, BaseHttpResponse $response)
    {
        if ($request->input('is_change_password') == 1) {
            $request->merge(['password' => bcrypt($request->input('password'))]);
            $data = $request->input();
        } else {
            $data = $request->except('password');
        }
        $member = $this->memberRepository->createOrUpdate($data, ['id' => $id]);

        event(new UpdatedContentEvent(MEMBER_MODULE_SCREEN_NAME, $request, $member));

        return $response
            ->setPreviousUrl(route('member.list'))
            ->setMessage(trans('core.base::notices.update_success_message'));
    }

    /**
     * @param Request $request
     * @param $id
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @author Bytesoft
     */
    public function getDelete(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $member = $this->memberRepository->findOrFail($id);
            $this->memberRepository->delete($member);
            event(new DeletedContentEvent(MEMBER_MODULE_SCREEN_NAME, $request, $member));

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
            $member = $this->memberRepository->findOrFail($id);
            $this->memberRepository->delete($member);
            event(new DeletedContentEvent(MEMBER_MODULE_SCREEN_NAME, $request, $member));
        }

        return $response->setMessage(trans('core.base::notices.delete_success_message'));
    }
}
