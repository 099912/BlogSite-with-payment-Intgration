<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sterial</title>
    @include('user.include.css')
</head>
<body>
    @include('user.include.navbar')
    @yield('content')
    @include('user.include.footer')
    @include('user.include.script')
</body>
<script>
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
