<?php

namespace IvanoMatteo\LaravelDeviceTracking\Http\Middleware;

use Closure;
use Dcat\Admin\Admin;
use Illuminate\Support\Facades\App;

class DeviceTrackerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        $guard = Auth::guard('admin');

        if (Admin::guard()->check()) {
            /** @var object */
            $user = Admin::user();

            if (!$user->deviceShouldBeDetected()) {
                return $next($request);
            }

            /** @var LaravelDeviceTracking */
            $ldt = App::make('laravel-device-tracking');

            if ($ldt->checkSessionDeviceHash() === false) {
                $ldt->detectFindAndUpdate();
            }
        }

        return $next($request);
    }
}
