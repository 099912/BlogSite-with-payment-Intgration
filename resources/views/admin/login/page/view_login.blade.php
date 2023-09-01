@extends('admin.login.layout.master_login')
@section('content')
<div class="login-header box-shadow">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="brand-logo">
            <a href="login.html">
                <img src="vendors/images/deskapp-logo.svg" alt="">
            </a>
        </div>

        {{-- <div class="login-menu">
            <ul>
                <li><a href="{{route('login.view')}}">Login</a></li>
            </ul>
        </div> --}}
    </div>
</div>

<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-7">
                <img src="vendors/images/login-page-img.png" alt="">
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="login-box bg-white box-shadow border-radius-10">
                    <div class="login-title">
                        <h2 class="text-center text-primary">Login To DeskApp</h2>
                    </div>

                    <form action="{{route('login.check')}}" method="POST">
                        @csrf

                        <div class="input-group custom">
                            <input type="text" name="email" class="form-control form-control-lg" placeholder="email">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                            </div>
                        </div>
                        <p style="color:red">@error('email'){{$message}}@enderror</p>

                        <div class="input-group custom">
                            <input type="password" name="password" class="form-control form-control-lg" placeholder="**********" required>

                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
                            <p style="color:red">@error('password'){{$message}}@enderror</p>

                        </div>
                        <div class="row pb-30" style="margin-right:">

                            <div class="col-6">
                                <div class="forgot-password" style="text-align: start"><a href="{{route('forget.password.get')}}">Forgot Password?</a></div>
                            </div>
                        </div>
                        <div class="row pb-30">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Remember</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group mb-0">

                                    <button class="btn btn-primary btn-lg btn-block" type="submit" >Sign In</button>
                                </div>
                                <div class="input-group mb-0 mt-3">

                                    <a href="{{route('auth.google')}}" class="btn btn-primary btn-lg btn-block">Google sign in</a>
                                </div>
                                <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
                                <div class="input-group mb-0">
                                    <a class="btn btn-outline-primary btn-lg btn-block" href="{{route('register.show')}}">Register To Create Account</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
