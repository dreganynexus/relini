<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function register(){
        if(Auth::check()){

            $get = User::all();
            $come = User::all();
            // die($get);
            return view('registration.register',compact('get','come'));
        }else{
            return redirect('loginpage');
        }
    }
    // public function profile($id){
    //     $get = User::all();

    //     $profile=User::find($id);
    //     return view('register',compact('profile','get')); ;
    // }

    public function login(){
        return view('registration.login');
    }

    public function createregister(request $request){
        if(Auth::check()){


        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'area' => 'required',
            'phoneNumber' => 'required|size:10',
            'password' => 'required',
            'role' => 'required',
        ]);
        $create= new User;
        $create->name=$request->name;
        $create->email = $request->email;
        $create->area = $request->area;
        $create->phoneNumber = $request->phoneNumber;
        $create->password = $request->password;
        $create->role = $request->role;
        $create->save();
        return redirect()->back()->with('create', 'user sucessfully registered...');
        // die($create);

    }
else{
    return redirect('loginpage');

}
    }
    public function deleteuser($id){
        if(Auth::check()){

            $get=User::find($id);
            $get->delete();
            // die($get);
            return redirect()->back()->with('delete', 'user deleted successfully..');
        }else{
    return redirect('loginpage');

        }

    }

    public function userlogin(request $request){
        $request->validate([
            'email' =>'required',
            'password' => 'required',
        ]);
        $credential=$request->only('email', 'password');
        if(Auth::attempt($credential)){
            return redirect('getsaler');
        }
        else{
            return redirect()->back()->with('login','wrong email or password');
        }
    }

    public function logout(){
        if(Auth::check()){

            session()->flush();
            Auth::logout();
            return redirect('/');
        }else{
    return redirect('loginpage');

        }
    }
}
