<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;
use Closure;
use Illuminate\Foundation\Application;

class CheckForMaintenanceMode extends Middleware
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array
     */
    // protected $except = [
    //     '/dashboard',
    //     '/admin*',
    //     '/site/live',
    //     '/index'
    // ];
    protected $app;
    public function __construct(Application $app)
    {
        $this->app = $app;
    }
    // hiển thị thông báo chó người dùng
    public function handle($request, Closure $next)
    {
        if ($this->app->isDownForMaintenance() && (!$this->isAdminRequest($request) || !$this->isAdminIpAdress($request))) {
            return response('<h1> Website đang tạm thời bảo trì </h1>', 503);
        }
        return $next($request);
    }
    private function isAdminIpAdress($request)
    {
        return !in_array($request->ip(), ['14.162.167.166', '42.112.111.20']);
    }
    // loại các route không cần bảo trì để admin quản lý
    private function isAdminRequest($request)
    {
        return ($request->is('dashboard') or $request->is('admin*') or $request->is('site/live'));
    }

}
