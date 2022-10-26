<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; 

class AdminController extends Controller
{
    
    public function Index(){
        return view('admin.admin_login');   
    } // end mehtod 


    public function Dashboard(){
        return view('admin.index');
    }// end mehtod 


    public function Login(Request $request){
        // dd($request->all());

        $check = $request->all();
        if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']  ])){
            return redirect()->route('admin.dashboard')->with('error','Admin Login Successfully');
        }else{
            return back()->with('error','Invaild Email Or Password');
        }

    } // end mehtod 


    public function AdminLogout(){

        Auth::guard('admin')->logout();
        return redirect()->route('login_from')->with('error','Admin Logout Successfully');

    } // end mehtod 


    

}
 