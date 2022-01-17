<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\Admin;
Session_start();
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin_login');
    }
   
      public function show_dashboard(Request $req)
    {
        $admin_email=$req->email;
        $admin_password=md5($req->password);
        $result= Admin::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($result){
            Session::put('admin_id',$result->admin_id);
            Session::put('admin_name',$result->admin_name);
            return Redirect::to('/dashboard');
        }
        else{
            Session::put('messege','Email or Password not Valid!!!!');
            return Redirect::to('/admins');
        }
    }
}
