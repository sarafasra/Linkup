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

        .comments-section{
    margin-top:20px;
}

.comment-box{
    background:#f3f2ef;
    padding:12px;
    border-radius:8px;
    margin-top:10px;
}

.comment-box strong{
    color:#0A66C2;
}

.comment-headline{
    color:gray;
    font-size:13px;
    margin-bottom:8px;
}

.comment-date{
    color:#777;
    font-size:12px;
    margin-top:5px;
}

.comment-form textarea{
    width:100%;
    padding:10px;
    border:1px solid #ddd;
    border-radius:8px;
    resize:none;
}

.comment-form textarea:focus{
    border-color:#0A66C2;
    outline:none;
}

.comment-btn{
    margin-top:10px;
    background:#0A66C2;
    color:white;
    border:none;
    padding:8px 18px;
    border-radius:20px;
    cursor:pointer;
}

.comment-btn:hover{
    background:#084b91;
}

.delete-comment{
    margin-top:10px;
    background:#dc3545;
    color:white;
    border:none;
    padding:6px 12px;
    border-radius:5px;
    cursor:pointer;
}
.action-btn{
    background:none;
    border:none;
    color:#555;
    font-size:15px;
    cursor:pointer;
    padding:8px 15px;
    border-radius:8px;
    transition:.3s;
}

.action-btn:hover{
    background:#f3f2ef;
}

.like-btn.liked{
    color:#0A66C2;
    font-weight:bold;
}

.comments{
    margin-top:20px;
}

.comment-form{
    display:flex;
    flex-direction:column;
    gap:10px;
}

.comment-form textarea{
    width:100%;
    border:1px solid #ddd;
    border-radius:20px;
    padding:12px 18px;
    resize:none;
    background:#f3f2ef;
}

.comment-form button{
    width:140px;
    background:#0A66C2;
    color:white;
    border:none;
    padding:10px;
    border-radius:20px;
    cursor:pointer;
}

.comment{
    display:flex;
    gap:12px;
    margin-top:15px;
}

.comment img{
    width:42px;
    height:42px;
    border-radius:50%;
    object-fit:cover;
}

.comment-body{
    flex:1;
    background:#f3f2ef;
    padding:12px;
    border-radius:12px;
}

.comment-header{
    display:flex;
    justify-content:space-between;
    margin-bottom:5px;
}

.comment-header strong{
    color:#0A66C2;
}

.comment-header small{
    color:gray;
}

.delete-comment{
    margin-top:8px;
    background:none;
    color:#dc3545;
    border:none;
    cursor:pointer;
    font-size:13px;
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

<a href="{{ route('profile.show',$post->user) }}">
    <img src="{{ asset('images/' . $post->user->image_url) }}" alt="">
</a>
            <div>
<h3>
    <a href="{{ route('profile.show',$post->user) }}"
       style="text-decoration:none;color:#0A66C2;">
        {{ $post->user->name }}
    </a>
</h3>
                @if($post->user->is_open_to_work)
                <span style="color: green">is open to work</span>
                @endif
                <p class="headline">
                    {{ $post->user->headline }}

                </p>
            </div>
        </div>

        <hr>

        <p class="content">
            {{ $post->content }}
            
        </p>

        <hr>

<div class="comments-section">

    <h4>{{ $post->comments->count() }} Commentaires</h4>

    <form class="comment-form" action="{{ route('comments.store', $post) }}" method="POST">
        @csrf

        <textarea
            name="content"
            rows="2"
            placeholder="Écrire un commentaire..."
            required
        ></textarea>

       <button class="comment-toggle" onclick="toggleComment({{ $post->id }})">
    💬 Comment ({{ $post->comments->count() }})
</button>

<div id="comment-form-{{ $post->id }}" class="comment-container" style="display:none;">

    <form action="{{ route('comments.store', $post) }}" method="POST">

        @csrf

        <textarea
            name="content"
            rows="2"
            placeholder="Écrire un commentaire..."
            required></textarea>

        <button type="submit" class="comment-btn">
            Commenter
        </button>

    </form>

</div>

</div>

<div class="actions">
<form action="{{ route('posts.like', $post) }}" method="POST">
    @csrf

    @php
        $liked = $post->likes->contains('user_id', auth()->id());
    @endphp

    <button type="submit" class="action-btn like-btn {{ $liked ? 'liked' : '' }}">
        ❤️  Like
        <span>{{ $post->likes->count() }}</span>
    </button>
</form>

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