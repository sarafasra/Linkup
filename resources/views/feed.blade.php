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
font-family:Arial,Helvetica,sans-serif;
}

body{
background:#f3f2ef;
}

header{
background:#0A66C2;
padding:15px 40px;
display:flex;
justify-content:space-between;
align-items:center;
color:white;
}

header h2{
font-size:28px;
}

.logout-btn{
background:white;
color:#0A66C2;
border:none;
padding:10px 18px;
border-radius:8px;
cursor:pointer;
font-weight:bold;
}

.container{
width:760px;
margin:30px auto;
}

.top-bar{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:25px;
}

.create-btn{
background:#0A66C2;
color:white;
padding:10px 18px;
border-radius:8px;
text-decoration:none;
font-weight:bold;
}

.post{
background:white;
border-radius:12px;
padding:20px;
margin-bottom:25px;
box-shadow:0 3px 10px rgba(0,0,0,.08);
}

.user{
display:flex;
align-items:center;
}

.user img{
width:60px;
height:60px;
border-radius:50%;
object-fit:cover;
margin-right:15px;
}

.user a{
text-decoration:none;
}

.user h3{
color:#0A66C2;
}

.headline{
color:#666;
font-size:14px;
}

.content{
margin:20px 0;
font-size:16px;
line-height:1.7;
}

.post-actions{
display:flex;
justify-content:space-around;
padding:12px 0;
border-top:1px solid #eee;
border-bottom:1px solid #eee;
margin-top:15px;
}

.action-btn{
background:none;
border:none;
cursor:pointer;
padding:10px 15px;
border-radius:8px;
font-size:15px;
color:#555;
transition:.3s;
}

.action-btn:hover{
background:#f3f2ef;
}

.like-btn.liked{
color:#0A66C2;
font-weight:bold;
}

.comment-container{
display:none;
margin-top:20px;
}

.comment-form textarea{
width:100%;
padding:12px;
border-radius:15px;
border:1px solid #ddd;
resize:none;
background:#f7f7f7;
}

.comment-btn{
margin-top:10px;
padding:10px 18px;
background:#0A66C2;
color:white;
border:none;
border-radius:20px;
cursor:pointer;
}

.actions{
display:flex;
justify-content:flex-end;
gap:10px;
margin-top:20px;
}

.btn-edit,
.btn-delete{
padding:8px 16px;
border:none;
border-radius:6px;
text-decoration:none;
color:white;
cursor:pointer;
}

.btn-edit{
background:#0A66C2;
}

.btn-delete{
background:#dc3545;
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
background:#f5f5f5;
padding:12px;
border-radius:10px;
}

.comment-header{
display:flex;
justify-content:space-between;
}

.delete-comment{
background:none;
border:none;
color:red;
cursor:pointer;
margin-top:8px;
}

</style>

</head>

<body>

<header>

<h2>LinkUp</h2>

<form action="{{ route('logout') }}" method="POST">

@csrf

<button class="logout-btn">
Logout
</button>

</form>

</header>

<div class="container">

<div class="top-bar">

<h1>News Feed</h1>

<a href="{{ route('posts.create') }}" class="create-btn">
+ Créer un post
</a>

</div>

@foreach($posts as $post)

<div class="post">

<div class="user">

<a href="{{ route('profile.show',$post->user) }}">
<img src="{{ asset('images/'.$post->user->image_url) }}">
</a>

<div>

<h3>
<a href="{{ route('profile.show',$post->user) }}" style="text-decoration:none;color:#0A66C2;">
{{ $post->user->name }}
</a>
</h3>

@if($post->user->is_open_to_work)
<span style="color:green;font-size:14px;">
🟢 Open To Work
</span>
@endif

<p class="headline">
{{ $post->user->headline }}
</p>

</div>

</div>

<p class="content">
{{ $post->content }}
</p>

<div class="post-actions">

<form action="{{ route('posts.like',$post) }}" method="POST">

@csrf

@php
$liked=$post->likes->contains('user_id',auth()->id());
@endphp

<button class="action-btn like-btn {{ $liked ? 'liked' : '' }}">

❤️ Like ({{ $post->likes->count() }})

</button>

</form>

<button
type="button"
class="action-btn"
onclick="toggleComment({{ $post->id }})">

💬 Comment ({{ $post->comments->count() }})

</button>

</div>

<div id="comment-form-{{ $post->id }}" class="comment-container">
    <form action="{{ route('comments.store',$post) }}" method="POST" class="comment-form">

    @csrf

    <textarea
        name="content"
        rows="2"
        placeholder="Écrire un commentaire..."
        required></textarea>

    <button type="submit" class="comment-btn">
        Publier
    </button>

</form>

@foreach($post->comments as $comment)

<div class="comment">

    <img src="{{ asset('images/'.$comment->user->image_url) }}" alt="">

    <div class="comment-body">

        <div class="comment-header">

            <div>

                <strong>{{ $comment->user->name }}</strong>

                <br>

                <small style="color:gray">
                    {{ $comment->user->headline }}
                </small>

            </div>

            <small style="color:gray">

                {{ $comment->created_at->diffForHumans() }}

            </small>

        </div>

        <p style="margin-top:8px">

            {{ $comment->content }}

        </p>

        @can('delete',$comment)

        <form
            action="{{ route('comments.destroy',$comment) }}"
            method="POST">

            @csrf
            @method('DELETE')

            <button class="delete-comment">

                🗑️ Supprimer

            </button>

        </form>

        @endcan

    </div>

</div>

@endforeach

</div>

<div class="actions">

    @can('update',$post)

    <a
        href="{{ route('posts.edit',$post) }}"
        class="btn-edit">

        Modifier

    </a>

    @endcan

    @can('delete',$post)

    <form
        action="{{ route('posts.destroy',$post) }}"
        method="POST">

        @csrf
        @method('DELETE')

        <button class="btn-delete">

            Supprimer

        </button>

    </form>

    @endcan

</div>

</div>

@endforeach

</div>
<script>

function toggleComment(id){

    let box = document.getElementById('comment-form-' + id);

    if(box.style.display === "none" || box.style.display === ""){

        box.style.display = "block";

    }else{

        box.style.display = "none"; 

    }

}

</script>

</body>
</html>