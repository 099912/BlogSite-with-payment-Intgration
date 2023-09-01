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
            <div class="col-md-6 col-lg-7">
                <img src="{{asset('vendors/images/login-page-img.png')}}" alt="">
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="login-box bg-white box-shadow border-radius-10">
                    <div class="login-title">
                        <h2 class="text-center text-primary">Registration Form</h2>
                    </div>

                    <form action="{{route('register.save')}}" method="POST">
                        @csrf
                        <div class="select-role">

                        </div>
                        <div class="input-group custom">
                            <input type="text" name="name" class="form-control form-control-lg" value="{{old('name')}}"  placeholder="Name">
                             <div class="input-group-append custom">
                                <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                            </div>
                        </div>
                        <p style="color:red">@error('name'){{$message}}@enderror</p>

                        <div class="input-group custom">
                            <input type="text" name="email" class="form-control form-control-lg" value="{{old('email')}}" placeholder="email">
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
                        </div>
                        <p style="color:red">@error('password'){{$message}}@enderror</p>


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group mb-0">

                                    <button class="btn btn-primary btn-lg btn-block" type="submit" >Register</button>
                                </div>
                                <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
                                <div class="input-group mb-0">
                                    <a class="btn btn-outline-primary btn-lg btn-block" href="{{route('login.view')}}">Login</a>
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
