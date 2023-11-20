<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response\getData;
class SetPaginationResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if(method_exists($response, 'getData')) {
            // if( isset($data['meta']) && isset($data['meta']['links'])) {

            // }
            $data = $response->getData(true);
            unset($data['meta']['links']);
            $response->setData($data);
        }

        return $response;
    }
}
