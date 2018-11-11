<?php

namespace Bytesoft\Menu\Http\Controllers;

use Assets;
use Bytesoft\Base\Events\BeforeEditContentEvent;
use Bytesoft\Base\Events\CreatedContentEvent;
use Bytesoft\Base\Events\DeletedContentEvent;
use Bytesoft\Base\Events\UpdatedContentEvent;
use Bytesoft\Base\Forms\FormBuilder;
use Bytesoft\Base\Http\Controllers\BaseController;
use Bytesoft\Base\Http\Responses\BaseHttpResponse;
use Bytesoft\Menu\Forms\MenuForm;
use Bytesoft\Menu\Tables\MenuTable;
use Bytesoft\Menu\Http\Requests\MenuRequest;
use Bytesoft\Menu\Repositories\Eloquent\MenuRepository;
use Bytesoft\Menu\Repositories\Interfaces\MenuInterface;
use Bytesoft\Menu\Repositories\Interfaces\MenuNodeInterface;
use Bytesoft\Support\Services\Cache\Cache;
use Exception;
use Illuminate\Cache\CacheManager;
use Illuminate\Http\Request;
use Menu;
use stdClass;

class MenuController extends BaseController
{

    /**
     * @var MenuInterface
     */
    protected $menuRepository;

    /**
     * @var MenuNodeInterface
     */
    protected $menuNodeRepository;

    /**
     * @var Cache
     */
    protected $cache;

    /**
     * MenuController constructor.
     * @param MenuInterface $menuRepository
     * @param MenuNodeInterface $menuNodeRepository
     * @param CacheManager $cache
     * @author Bytesoft
     */
    public function __construct(
        MenuInterface $menuRepository,
        MenuNodeInterface $menuNodeRepository,
        CacheManager $cache
    )
    {
        $this->menuRepository = $menuRepository;
        $this->menuNodeRepository = $menuNodeRepository;
        $this->cache = new Cache($cache, MenuRepository::class);
    }

    /**
     * @param MenuTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Bytesoft
     * @throws \Throwable
     */
    public function getList(MenuTable $dataTable)
    {
        page_title()->setTitle(trans('core.base::layouts.menu'));

        return $dataTable->renderTable();
    }

    /**
     * @return string
     * @author Bytesoft
     */
    public function getCreate(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('core.menu::menu.create'));

        return $formBuilder->create(MenuForm::class)->renderForm();
    }

    /**
     * @param MenuRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @author Bytesoft, Tedozi Manson
     */
    public function postCreate(MenuRequest $request, BaseHttpResponse $response)
    {
        $menu = $this->menuRepository->getModel();

        $menu->name = $request->input('name');
        $menu->slug = $this->menuRepository->createSlug($request->input('name'));
        $menu = $this->menuRepository->createOrUpdate($menu);

        $this->cache->flush();

        event(new CreatedContentEvent(MENU_MODULE_SCREEN_NAME, $request, $menu));

        return $response
            ->setPreviousUrl(route('menus.list'))
            ->setNextUrl(route('menus.edit', $menu->id))
            ->setMessage(trans('core.base::notices.create_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return string
     * @author Bytesoft, Tedozi Manson
     */
    public function getEdit($id, Request $request, FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('core.menu::menu.edit'));

        Assets::addJavascript(['jquery-nestable'])
            ->addStylesheets(['jquery-nestable'])
            ->addAppModule(['menu']);

        $oldInputs = old();
        if ($oldInputs && $id == 0) {
            $oldObject = new stdClass();
            foreach ($oldInputs as $key => $row) {
                $oldObject->$key = $row;
            }
            $menu = $oldObject;
        } else {
            $menu = $this->menuRepository->findById($id);
            if (!$menu) {
                $menu = $this->menuRepository->getModel();
            }
        }

        event(new BeforeEditContentEvent(MENU_MODULE_SCREEN_NAME, $request, $menu));

        return $formBuilder->create(MenuForm::class)->setModel($menu)->renderForm();
    }

    /**
     * @param MenuRequest $request
     * @param $id
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @author Bytesoft, Tedozi Manson
     */
    public function postEdit(MenuRequest $request, $id, BaseHttpResponse $response)
    {
        $menu = $this->menuRepository->getModel()->findOrNew($id);

        $menu->name = $request->input('name');
        $this->menuRepository->createOrUpdate($menu);
        event(new UpdatedContentEvent(MENU_MODULE_SCREEN_NAME, $request, $menu));

        $deletedNodes = explode(' ', ltrim($request->get('deleted_nodes', '')));
        $this->menuNodeRepository->getModel()->whereIn('id', $deletedNodes)->delete();
        Menu::recursiveSaveMenu(json_decode($request->get('menu_nodes'), true), $menu->id, 0);

        $this->cache->flush();

        return $response
            ->setPreviousUrl(route('menus.list'))
            ->setMessage(trans('core.base::notices.create_success_message'));
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
            $menu = $this->menuRepository->findOrFail($id);
            $this->menuNodeRepository->deleteBy(['menu_id' => $menu->id]);
            $this->menuRepository->delete($menu);

            event(new DeletedContentEvent(MENU_MODULE_SCREEN_NAME, $request, $menu));

            return $response->setMessage(trans('core.base::notices.delete_success_message'));
        } catch (Exception $ex) {
            return $response
                ->setError()
                ->setMessage($ex->getMessage());
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
            $menu = $this->menuRepository->findOrFail($id);
            $this->menuNodeRepository->deleteBy(['menu_id' => $menu->id]);
            $this->menuRepository->delete($menu);
            event(new DeletedContentEvent(MENU_MODULE_SCREEN_NAME, $request, $menu));
        }

        return $response->setMessage(trans('core.base::notices.delete_success_message'));
    }
}
