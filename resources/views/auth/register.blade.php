<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - LinkUp</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#f3f2ef;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .register-box{
            background:#fff;
            width:400px;
            padding:35px;
            border-radius:10px;
            box-shadow:0 5px 20px rgba(0,0,0,.15);
        }

        h2{
            text-align:center;
            margin-bottom:25px;
            color:#0A66C2;
        }

        input{
            width:100%;
            padding:12px;
            margin-bottom:18px;
            border:1px solid #ccc;
            border-radius:6px;
            font-size:15px;
        }

        input:focus{
            outline:none;
            border-color:#0A66C2;
        }

        button{
            width:100%;
            padding:12px;
            background:#0A66C2;
            color:white;
            border:none;
            border-radius:6px;
            cursor:pointer;
            font-size:16px;
            font-weight:bold;
        }

        button:hover{
            background:#004182;
        }

        p{
            text-align:center;
            margin-top:20px;
            color:#555;
        }

        a{
            text-decoration:none;
            color:#0A66C2;
            font-weight:bold;
        }

        a:hover{
            text-decoration:underline;
        }
    </style>

</head>
<body>

<div class="register-box">

    <h2>Create your LinkUp Account</h2>

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <input type="text" name="name" placeholder="Full Name">

        <input type="email" name="email" placeholder="Email">

        <input type="text" name="headline" placeholder="Professional Headline">

        <input type="password" name="password" placeholder="Password">

        <input type="password" name="password_confirmation" placeholder="Confirm Password">

        <button type="submit">Register</button>

    </form>

    <p>
        Already have an account?
        <a href="{{ route('login') }}">Login</a>
    </p>

</div>

</body>
</html>