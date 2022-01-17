<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

Session_start();
class SuperAdminController extends Controller
{
    public function dashboard()
    {
       $this->AdminAuthcheck();
        return view('admin.dashboard');
        
    }
    public function logout()
    {
        Session::flush();
       return Redirect::to('/admins');
    }
    public function AdminAuthcheck()
    {
       $result= Session::get('admin_id');
        if($result)
        {
            return;
        }
        else{
            return Redirect::to('/admins')->send();
        }
    }
}
