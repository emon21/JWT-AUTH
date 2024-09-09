<?php

namespace App\Http\Middleware;

use Closure;

use App\Helper\Token;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $token = $request->cookie('token');

        // $result = Token::VerifyToken($token);
        $result = Token::VerifyToken($token);

        if ($result == 'unauthorized') {
            return redirect('/user-login');

            // return response()->json([
            //     'status' => 'failed',
            //     'message' => 'unauthorized'
            // ],status:401);
        } else {

            $request->headers->set('email', $result->userEmail);
            $request->headers->set('id', $result->userID);
            return $next($request);
        }
    }
}
