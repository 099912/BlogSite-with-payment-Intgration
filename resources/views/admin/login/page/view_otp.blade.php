@extends('admin.login.layout.master_login')
@section('content')
<div class="login-header box-shadow">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="brand-logo">
            <a href="login.html">
                <img src="vendors/images/deskapp-logo.svg" alt="">
            </a>
        </div>
        <div class="login-menu">
            <ul>
                <li><a href="{{route('login.view')}}">Login</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="{{asset('vendors/images/forgot-password.png')}}" alt="">
            </div>
            <div class="col-md-6">
                <div class="login-box bg-white box-shadow border-radius-10">
                    <div class="login-title">
                        <h2 class="text-center text-primary">Enter OTP</h2></h2>
                    </div>
                    <h6 class="mb-20">Enter your otp to reset your password</h6>
                    <form action="{{route('otp.post')}}" method="POST">
                        @csrf
                        {{-- <input type="hidden" name="token" value="{{$token}}"> --}}

                        <div class="input-group custom">
                            <input type="text" name="token" class="form-control form-control-lg" placeholder="Enter your Otp">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <p style="color:red">@error('token'){{$message}}@enderror</p>

                        <div class="row align-items-center">
                            <div class="col-5">
                                <div class="input-group mb-0">
                                    <!--
                                        use code for form submit
                                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
                                    -->
                                    <button class="btn btn-primary btn-lg btn-block" type="submit" >Submit</button>
                                </div>
                            </div>
                            {{-- <div class="col-2">
                                <div class="font-16 weight-600 text-center" data-color="#707373">OR</div>
                            </div>
                            <div class="col-5">
                                <div class="input-group mb-0">
                                    <a class="btn btn-outline-primary btn-lg btn-block" href="login.html">Login</a>
                                </div>
                            </div> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
