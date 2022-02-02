@extends('frontend.master')
@section('content')
<style>
.login-container{
    margin-top: 5%;
    margin-bottom: 5%;
}
.login-logo{
    position: relative;
    margin-left: -41.5%;
}
.login-logo img{
    position: absolute;
    width: 20%;
    margin-top: 19%;
    background: #282726;
    border-radius: 4.5rem;
    padding: 5%;
}
.login-form-1{
    padding: 9%;
    background:#15161D;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-1 h3{
    text-align: center;
    margin-bottom:12%;
    color:#fff;
}
.login-form-2{
    padding: 9%;
    background: #D10024;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-2 h3{
    text-align: center;
    margin-bottom:12%;
    color: #fff;
}
.btnSubmit{
    font-weight: 600;
    width: 50%;
    color: #282726;
    background-color: #fff;
    border: none;
    border-radius: 1.5rem;
    padding:2%;
}
.btnForgetPwd{
    color: #fff;
    font-weight: 600;
    text-decoration: none;
}
.btnForgetPwd:hover{
    text-decoration:none;
    color:#fff;
}

</style>

<div class="container login-container">
            <div class="row">
                <div class="box-header" data-original-title>
    
             </div>
                <div class="col-md-6 login-form-1">

                  
                    <h3>Login</h3>
                     <h4 style="color: #D10024; class="btnForgetPwd"> 
                            <?php
                            $msg=Session::get('messege');
                            if($msg){
                                echo "$msg";
                                 Session::put('messege',null);
                            }
                            ?>
                            </h4>
                    <form action="{{url('/login-check')}} " method="get">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Your Email *" value="" required />
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Your Password *" value="" required />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                        <div class="form-group">
                            <a href="#" class="btnForgetPwd">Forget Password?</a>
                        </div>
                           
                    </form>
                </div>
                <div class="col-md-6 login-form-2">
                    <div class="login-logo">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                    </div>
                    <h3>Sign Up</h3>
                    <form action="{{url('/signup')}}" method="post">
                    @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Full Name *" value="" required />
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Your Email *" value="" required />
                        </div>
                      
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Your Password *" value=""  required/>
                        </div>
                         <div class="form-group">
                            <input type="text" name="mobile" class="form-control" placeholder="Mobile Number *" value="" required />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Register" />
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>

@endsection