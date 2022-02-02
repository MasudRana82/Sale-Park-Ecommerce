<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

class CustomerController extends Controller
{
    public function login()
    {
        $categories = Category::all();
        return view('frontend.login.login_page', compact('categories'));
    }

    public function signup(Request $req)
    {
        $data = array();
        $data['name'] = $req->name;
        $data['email'] = $req->email;
        $data['password'] = $req->password;
        $data['mobile']= $req->mobile;
        $id = Customer::insertGetId($data);
        Session::put('id',$id);
        Session::put('name', $req->name);

        return Redirect::to('/checkout');
    }
    
    
    public function login_check(Request $req)
    {
        $email = $req->email;
        $password = $req->password;
        $result = Customer::where('email', $email)->where('password', $password)->first();
        if ($result) {
            Session::put('id', $result->id);
            Session::put('name', $result->name);
            return Redirect::to('/checkout');
        } else {
             Session::put('messege', 'Email Or Password is Incorrect !');
           
            return Redirect::to('/login');
        }
    }
     public function customer_logout()
     {
         Session::Flush();

         return Redirect::to('/');
     }

}
