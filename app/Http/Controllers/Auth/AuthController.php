<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->user_type == 'super') {
                return redirect()->intended('admin');
            } elseif ($user->user_type == 'staff') {
                return redirect()->intended('staff');
            }
        } 
        return view('Auth.login');
    }

    public function proc_login(Request $request)
    {
        request()->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ]);
            
        $cred = $request->only('email','password');

            if (Auth::attempt($cred)) {
                $user = Auth::user();
                if ($user->user_type == 'super') {
                    return redirect()->intended('admin');
                } elseif ($user->user_type == 'staff') {
                    return redirect()->intended('staff');
                }
                return redirect('login')->with('status', 'Unauthorized login!');
            }

        return redirect('/')->with('status', 'These credentials do not match our records.');
                                
    }

    public function logout(Request $request)
    {
       $request->session()->flush();
       Auth::logout();
       return Redirect('login');
    }
}
