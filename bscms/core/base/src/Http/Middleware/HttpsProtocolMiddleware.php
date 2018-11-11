<?php

namespace Bytesoft\Base\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HttpsProtocolMiddleware
{

    /**
     * @param Request $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse
     * @author Bytesoft
     */
    public function handle($request, Closure $next)
    {
        if (!$request->secure() && config('core.base.general.enable_https_support', false)) {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
