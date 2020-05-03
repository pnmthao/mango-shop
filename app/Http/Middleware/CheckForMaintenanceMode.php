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
    protected $app;
    public function __construct(Application $app)
    {
        $this->app = $app;
    }
    public function handle($request, Closure $next)
    {
        if ($this->app->isDownForMaintenance() && (!$this->isAdminRequest($request) || !$this->isAdminIpAdress($request))) {
            return response('Website đang tạm thời bảo trì', 503);
        }
        return $next($request);
    }
   /* private function isAdminIpAdress($request)
    {
        return !in_array($request->ip(), ['14.162.167.166', '42.112.111.20']);
    }*/
    private function isAdminRequest($request)
    {
        return ($request->is('dang-nhap'));
    }

}
