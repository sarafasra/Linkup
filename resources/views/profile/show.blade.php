<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }}</title>

    <style>
        body{
            font-family:Arial, Helvetica, sans-serif;
            background:#f3f2ef;
            margin:0;
        }

        .container{
            width:800px;
            margin:30px auto;
        }

        .profile-card{
            background:white;
            padding:30px;
            border-radius:10px;
            box-shadow:0 3px 10px rgba(0,0,0,.1);
            text-align:center;
        }

        .profile-card img{
            width:120px;
            height:120px;
            border-radius:50%;
            object-fit:cover;
        }

        .profile-card h2{
            margin-top:15px;
            color:#0A66C2;
        }

        .profile-card p{
            color:gray;
            margin:5px 0;
        }

        .post{
            background:white;
            margin-top:20px;
            padding:20px;
            border-radius:10px;
            box-shadow:0 3px 10px rgba(0,0,0,.1);
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

    <a href="{{ route('feed.index') }}" class="back">
        ← Retour au feed
    </a>

    <div class="profile-card">

        <img src="{{ asset('images/'.$user->image_url) }}" alt="">

        <h2>{{ $user->name }}</h2>

        <p>{{ $user->headline }}</p>

        <p>{{ $user->company }}</p>

    </div>

    <h2>Publications</h2>

    @foreach($posts as $post)

        <div class="post">

            {{ $post->content }}

        </div>

    @endforeach

</div>

</body>
</html>