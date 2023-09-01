<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Login</title>
@include('admin.include.css')
<script src="{{asset('js/app.js')}}"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="login-page">
    @yield('content')
    @include('admin.include.script')
</body>
<script>

    @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif
        @if(Session::has('message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
    toastr.success("{!!Session::get('message')!!}");
    @endif

    @if(Session::has('mail'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
    toastr.success("{!!Session::get('mail')!!}");
    @endif

    @if(Session::has('success'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
    toastr.success("{!!Session::get('success')!!}");
    @endif
</script>
</html>
