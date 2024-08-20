<?php

namespace App\Http\Controllers;

use App\Helper\Token;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    function UserCreate(){
        return view('user.user-registration');
    }
    function UserRegistration(Request $request)
    {

        try {

            User::create([
                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'mobile' => $request->input('mobile'),
            ]);

            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'User created successfully.'
                ],
                status: 201
            );
          
        } catch (Exception $ex) {

            return response()->json(
                [
                    'status' => 'failed',
                    'message' => 'User created Failed.'
                    // 'message' => $ex->getMessage()
                ],
                status: 403
            );
        }
    }

    function UserLogin()
    {
        return view('user.user-login');

       
    }

    function Login(Request $request){
        $user = User::where('email', $request->input('email'))
            ->where('password', $request->input('password'))
            ->count();

        if ($user == 1) {

            //JWT token Issue JWTToken
            $token = Token::CreateToken($request->input('email'));

            // if ($token == 1) {
            //     // redirect to dashboard

            //     return response()->json(['status' => 'success', 'message' => 'User login successfully.'], status: 200)->cookie('token', $token, 60 * 24 * 30)->redirect('/dashboard');
            // } else {

            //     return redirect('/user-login');
            // }

                //  return response()->json(['status' => 'success', 'message' => 'User login successfully.'], status: 200)->cookie('token', $token, 60 * 24 * 30);

            return redirect('/dashboard')->cookie('token', $token, 60 * 24 * 30);

          
            
        } else {

            return response()->json(
                [
                    'status' => 'failed',
                    'message' => 'unauthorized',

                ],
                status: 403
            );
        }
    }

    function dashboard(Request $request){

        $token = $request->cookie('token');
        return view('dashboard', ['token' => $token]);
    }

    //logout
    function logout(Request $request){
        $token = $request->cookie('token');
        return redirect('/user-login')->cookie('token', $token, 0);
    }

}
