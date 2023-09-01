@extends('admin.login.layout.master_login')
@section('content')

<div class="login-header box-shadow">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="brand-logo">
            <a href="login.html">
                <img src="{{asset('vendors/images/deskapp-logo.svg')}}" alt="">
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
                        <h2 class="text-center text-primary">Reset Password</h2>
                    </div>
                    <h6 class="mb-20">Enter your new password, confirm and submit</h6>
                    <form action="{{route('reset.password.post')}}" method="POST">
                        @csrf
                        {{-- <input type="hidden" name="token" value="{{$token}}"> --}}
                        {{-- <div class="input-group custom">
                            <input type="email" name="email" class="form-control form-control-lg" placeholder="New Password">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
                            <p style="color:red">@error('email'){{$message}}@enderror</p>

                        </div> --}}
                        <div class="input-group custom">
                            <input type="text" name="password" class="form-control form-control-lg" placeholder="New Password">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
                            <p style="color:red">@error('password'){{$message}}@enderror</p>

                        </div>
                        <div class="input-group custom">
                            <input type="password" name="password_confirmation" class="form-control form-control-lg" placeholder="Confirm New Password">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
                            <p style="color:red">@error('password_confirmation'){{$message}}@enderror</p>

                        </div>
                        <div class="row align-items-center">
                            <div class="col-5">
                                <div class="input-group mb-0">
                                    <!--
                                        use code for form submit
                                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
                                    -->
                                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">

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
