<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::user()){
            return redirect()->route('dashboard');
        }else{
            return view('auth.login');
        }
    }

    // Admin Register 
    public function register(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|min:3',
            'email'=>'required',
            'type'=>'required',
            'password'=>'required|min:6',
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'type'=>$request->type,
            'password' => Hash::make($request->password),
        ]);

        if($user){
            return  redirect()->route('login')->with('success', "Successfully Save.");
        }
    }

    // -------- Admin Login
    public function adminlogin(Request $request){       
        $this->validate($request, [
            'email'=>'required',
            'password'=>'required|min:6',
        ]);
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            if(Auth::user()->type == 'admin'){
                return redirect()->route('dashboard')->with('success', 'You have Loging.');
            }else{
                return redirect()->route('index')->with('success', 'You have Loging.');
            }
            // return Auth::user();
        }else{
            return redirect()->back()->with('faild', 'Invalid credentials');
        }
    }

    // -------- Admin Logout
    public function adminLogout(Request $request){
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}
