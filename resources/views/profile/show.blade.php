<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }}</title>

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
            width:900px;
            margin:40px auto;
        }

        .back{
            display:inline-block;
            text-decoration:none;
            margin-bottom:20px;
            color:#0A66C2;
            font-weight:bold;
            font-size:18px;
        }

        .profile-card{
            background:white;
            border-radius:15px;
            overflow:hidden;
            box-shadow:0 5px 15px rgba(0,0,0,.08);
            margin-bottom:35px;
        }

        .cover{
            height:220px;
            background:linear-gradient(135deg,#0A66C2,#4fa3ff);
        }

        .profile-content{
            text-align:center;
            padding:0 30px 35px;
        }

        .profile-content img{
            width:140px;
            height:140px;
            border-radius:50%;
            object-fit:cover;
            border:6px solid white;
            margin-top:-70px;
            box-shadow:0 4px 12px rgba(0,0,0,.2);
        }

        .profile-content h2{
            margin-top:18px;
            color:#0A66C2;
            font-size:38px;
        }

        .headline{
            color:#555;
            font-size:22px;
            margin-top:10px;
            font-weight:bold;
        }

        .company{
            color:#777;
            margin-top:8px;
            font-size:18px;
        }

        .badge{
            display:inline-block;
            margin-top:18px;
            background:#dff5e2;
            color:#1f7a3f;
            padding:10px 20px;
            border-radius:30px;
            font-weight:bold;
        }

        h2.title{
            margin-bottom:20px;
            color:#222;
        }

        .post{
            background:white;
            border-radius:12px;
            padding:20px;
            margin-bottom:20px;
            border:1px solid #ddd;
            transition:.3s;
        }

        .post:hover{
            box-shadow:0 8px 18px rgba(0,0,0,.08);
        }

        .post-header{
            display:flex;
            align-items:center;
            gap:15px;
        }

        .post-header img{
            width:60px;
            height:60px;
            border-radius:50%;
            object-fit:cover;
        }

        .post-header strong{
            font-size:20px;
        }

        .post-header p{
            color:#666;
            font-size:15px;
            margin-top:3px;
        }

        .time{
            color:#999;
            font-size:13px;
        }

        .post-content{
            margin-top:18px;
            font-size:17px;
            line-height:1.7;
            color:#333;
        }

        .post-footer{
            margin-top:20px;
            padding-top:15px;
            border-top:1px solid #eee;
            display:flex;
            justify-content:space-around;
            color:#666;
            font-weight:bold;
        }

        .post-footer span{
            cursor:pointer;
            transition:.3s;
        }

        .post-footer span:hover{
            color:#0A66C2;
        }

    </style>

</head>
<body>

<div class="container">

    <a href="{{ route('feed.index') }}" class="back">
        ← Retour au feed
    </a>

    <div class="profile-card">

        <div class="cover"></div>

        <div class="profile-content">

            <img src="{{ asset('images/'.$user->image_url) }}" alt="">

            <h2>{{ $user->name }}</h2>

            <p class="headline">
                {{ $user->headline }}
            </p>

            @if($user->company)
                <p class="company">
                    {{ $user->company }}
                </p>
                <div style="margin-top:20px;display:flex;justify-content:center;gap:40px;font-size:18px;">
    <div>
        <strong>{{ $followersCount }}</strong><br>
        Followers
    </div>

    <div>
        <strong>{{ $followingCount }}</strong><br>
        Following
    </div>
</div>
            @endif

            @if($user->is_open_to_work)
                <div class="badge"> 
                    🟢 Open To Work
                </div>
            @endif
@if(auth()->id() == $user->id)

<a href="{{ route('profile.edit') }}"
style="
display:inline-block;
margin-top:20px;
padding:10px 20px;
background:#0A66C2;
color:white;
text-decoration:none;
border-radius:8px;">

Modifier mon profil

</a>

@else

<form action="{{ route('users.follow', $user) }}" method="POST" style="margin-top:20px;">
    @csrf

    @if(auth()->user()->following->contains($user->id))

        <button type="submit"
        style="
        padding:10px 25px;
        border:none;
        border-radius:8px;
        background:#666;
        color:white;
        cursor:pointer;">
            Following
        </button>

    @else

        <button type="submit"
        style="
        padding:10px 25px;
        border:none;
        border-radius:8px;
        background:#0A66C2;
        color:white;
        cursor:pointer;">
            + Follow
        </button>

    @endif

</form>

@endif
        </div>

    </div>

    <h2 class="title">Publications</h2>

    @foreach($posts as $post)

    <div class="post">

        <div class="post-header">

            <img src="{{ asset('images/'.$user->image_url) }}" alt="">

            <div>

                <strong>{{ $user->name }}</strong>

                <p>{{ $user->headline }}</p>

                <span class="time">
                    {{ $post->created_at->diffForHumans() }}
                </span>

            </div>

        </div>

        <div class="post-content">
            {{ $post->content }}
        </div>

        <div class="post-footer">

            <span>❤️ Like</span>

            <span>💬 Comment</span>

        </div>

    </div>

    @endforeach

</div>

</body>
</html>