<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<body>
    <p>Your OTP is: {{ $token }}</p>
    <p>Use this OTP to verify your account.</p>
</body>
</html>
{{-- <a href="{{ route('reset.password.get', $token) }}">Reset Password</a> --}}
