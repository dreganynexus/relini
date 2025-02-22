<?php

namespace App\Http\Controllers;

use App\Models\salersend;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        // Special admin username and password
        $specialUsername = 'admin';
        $specialPassword = 'password';

        if ($credentials['username'] == $specialUsername && $credentials['password'] == $specialPassword) {
            // Authentication passed
            Auth::loginUsingId(1); // You can set the admin user ID accordingly

            // return redirect()->back();
            // return 'hee';
            // $get = Upload::all();
            return redirect('/register');

            // $product = salersend::all();
            // $sum = salersend::sum('amount');
            // $count = salersend::count('id');

            // return view('Back.sold_producti', compact('product', 'sum', 'count'));

        }

        // Authentication failed
        return redirect()->back()->with('error','Incorrect Username or password') ;
    }

    public function logout()
    {
        Auth::logout();
        return  view('/');
    }

    public function dashboard()
    {
        // Check if the user is logged in
        if (Auth::check() && Auth::user()->id == 1) {
            return view('/');
        }

        // If not logged in or not the admin user, redirect to login
        return redirect()->back();
    }

    public function logcome()
    {

            return view('/');

    }

}
