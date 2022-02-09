<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Session;
use Illuminate\Http\Request;

class CommentController extends Controller
{
  public function add_commnent(Request $req)
  {
    $customer_id = Session::get('id');
    if($customer_id){
      $comments =new Comment();
      $comments->user_id= Session::get('id');
      $comments->product_id = $req->product;
      $comments->comment = $req->comment;
      $comments->rating = $req->rating;
      $comments->save();
    notify()->success('Comment added Successfully');
      return redirect()->back();
    }
    else
    {
            notify()->error('Please login in your account!');
            return redirect('/login'); 
    }

  }
}
