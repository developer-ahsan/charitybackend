<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
    public function register(Request $request)
    {
        dd($request);
    }
    public function loginView()
    {
        if(Auth::check()) {
            return redirect('/dashboard');
        } else {
        return view('Admin.login');
            
        }
    }
    public function CheckLogin()
    {
        if(Auth::check()) {
            return redirect('/dashboard');
        } else {
            return redirect('/login');
        }
    }
    public function Userlogin(Request $request)
    {
         $validator = $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        if(!$user) {
            toastr()->error('Your Account is not Exist.');
            return redirect()->back();
        } else {
            if ($user->password == $request->password) {
                Auth::login($user);
                return redirect('/');
            } else {
                toastr()->error('Your Password is not matched.');
                return redirect()->back();

            }
        }
    }
    public function forgetpassword()
    {
        return view('forgetpassword');
    }
    public function resetpassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if(!$user) {
            toastr()->error('This email is not registerd');
            return redirect()->back();
        } else {
            \Mail::to($request->email)->send(new ResetPassword($user));
            toastr()->success('Email Sent Successfully.');
            return redirect('/');
        }
    }
    public function resetpasswordEmail($email)
    {
        return view('ResetPassword')->with('email',$email);

    }
    public function resetpasswordEmails(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->password = $request->password;
        $user->save();
        toastr()->success('Password Changed Successfully...');
        return redirect('/');
    }
}
