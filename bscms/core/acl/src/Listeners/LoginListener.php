<?php

namespace Bytesoft\ACL\Listeners;

use Assets;
use Auth;
use Bytesoft\ACL\Models\User;
use Bytesoft\ACL\Models\UserMeta;
use Illuminate\Auth\Events\Login;

class LoginListener
{

    /**
     * Handle the event.
     *
     * @param  Login $event
     * @return void
     * @author Bytesoft
     * @throws \Exception
     */
    public function handle(Login $event)
    {
        /**
         * @var User $user
         */
        $user = $event->user;
        if ($user instanceof User) {
            if ($user->hasPermission('dashboard.index')) {
                $locale = UserMeta::getMeta('admin-locale', false, $user->getKey());

                if ($locale != false && array_key_exists($locale, Assets::getAdminLocales())) {
                    app()->setLocale($locale);
                    session()->put('admin-locale', $locale);
                }

                cache()->forget(md5('cache-dashboard-menu-' . Auth::user()->getKey()));
            }
        }
    }
}
