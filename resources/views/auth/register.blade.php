<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

<h2>Register</h2>

<form action="{{ route('register') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Name"><br><br>

    <input type="email" name="email" placeholder="Email"><br><br>

    <input type="text" name="headline" placeholder="Headline"><br><br>

    <input type="password" name="password" placeholder="Password"><br><br>

    <input type="password" name="password_confirmation" placeholder="Confirm Password"><br><br>

    <button type="submit">Register</button>

</form>

<p>Already have an account?
    <a href="{{ route('login') }}">Login</a>
</p>

</body>
</html>