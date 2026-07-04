<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkUp Feed</title>

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

        header{
            background:#0A66C2;
            color:white;
            padding:15px 40px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        header h2{
            font-size:28px;
        }

        .logout-btn{
            background:white;
            color:#0A66C2;
            border:none;
            padding:10px 18px;
            border-radius:6px;
            cursor:pointer;
            font-weight:bold;
        }

        .logout-btn:hover{
            background:#e6e6e6;
        }
        .create-btn{
    background:#0A66C2;
    color:white;
    text-decoration:none;
    padding:10px 18px;
    border-radius:6px;
    font-weight:bold;
    transition:0.3s;
}

.create-btn:hover{
    background:#084b91;
}

        .container{
            width:700px;
            margin:30px auto;
        }

        .post{
            background:white;
            padding:20px;
            margin-bottom:20px;
            border-radius:10px;
            box-shadow:0 3px 10px rgba(0,0,0,.1);
        }

        .user{
            display:flex;
            align-items:center;
            margin-bottom:15px;
        }

        .user img{
            width:70px;
            height:70px;
            border-radius:50%;
            margin-right:15px;
            object-fit:cover;
        }

        .user h3{
            color:#0A66C2;
        }

        .headline{
            color:gray;
            font-size:14px;
        }

        hr{
            margin:15px 0;
            border:0;
            border-top:1px solid #ddd;
        }

        .content{
            font-size:16px;
            line-height:1.6;
        }

        .actions{
            display:flex;
            justify-content:flex-end;
            gap:10px;
            margin-top:20px;
        }

        .actions form{
            margin:0;
        }

        .btn-edit,
        .btn-delete{
            padding:8px 16px;
            border:none;
            border-radius:6px;
            color:white;
            text-decoration:none;
            cursor:pointer;
            font-size:14px;
            font-weight:bold;
        }

        .btn-edit{
            background:#0A66C2;
        }

        .btn-edit:hover{
            background:#084b91;
        }

        .btn-delete{
            background:#dc3545;
        }

        .btn-delete:hover{
            background:#b52a37;
        }

    </style>

</head>
<body>

<header>

    <h2>LinkUp</h2>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="logout-btn" type="submit">Logout</button>
    </form>

</header>

<div class="container">

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">

        <h1>News Feed</h1>

        <a href="{{ route('posts.create') }}" class="create-btn">
            + Créer un post
        </a>

    </div>

    @foreach($posts as $post)

    <div class="post">

        <div class="user">

            <img src="{{ asset('images/' . $post->user->image_url)}}" alt="{{ $post->user->name }}">

            <div>
                <h3>{{ $post->user->name }}</h3>
                <p class="headline">{{ $post->user->headline }}</p>
            </div>

        </div>

        <hr>

        <p class="content">
            {{ $post->content }}
        </p>

<div class="actions">

    @can('update', $post)
        <a href="{{ route('posts.edit', $post->id) }}" class="btn-edit">
            Modifier
        </a>
    @endcan

    @can('delete', $post)
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn-delete">
                Supprimer
            </button>
        </form>
    @endcan

</div>

    </div>

    @endforeach

</div>

</body>
</html>