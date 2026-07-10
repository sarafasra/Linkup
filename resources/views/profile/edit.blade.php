
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#f3f2ef;
        }

        .container{
            width:600px;
            margin:50px auto;
        }

        .card{
            background:white;
            padding:30px;
            border-radius:12px;
            box-shadow:0 5px 15px rgba(0,0,0,.08);
        }

        h2{
            margin-bottom:25px;
            color:#0A66C2;
        }

        label{
            display:block;
            margin-top:18px;
            margin-bottom:6px;
            font-weight:bold;
        }

        input{
            width:100%;
            padding:12px;
            border:1px solid #ccc;
            border-radius:8px;
        }

        button{
            margin-top:25px;
            width:100%;
            padding:14px;
            background:#0A66C2;
            color:white;
            border:none;
            border-radius:8px;
            cursor:pointer;
            font-size:16px;
            font-weight:bold;
        }

        button:hover{
            background:#084b91;
        }

        .back{
            display:inline-block;
            margin-bottom:20px;
            text-decoration:none;
            color:#0A66C2;
            font-weight:bold;
        }

    </style>

</head>

<body>

<div class="container">

<a href="{{ route('profile.show', auth()->user()) }}" class="back">
← Retour au profil
</a>

<div class="card">

<h2>Modifier mon profil</h2>

<form action="{{ route('profile.update') }}"
      method="POST"
      enctype="multipart/form-data">

@csrf
@method('PUT')

<label>Headline</label>

<input
type="text"
name="headline"
value="{{ old('headline',$user->headline) }}">

<label>Company</label>

<input
type="text"
name="company"
value="{{ old('company',$user->company) }}">

<label>Photo</label>

<input
type="file"
name="profile_photo">

<button type="submit">

Enregistrer

</button>

</form>

</div>

</div>

</body>
</html>

