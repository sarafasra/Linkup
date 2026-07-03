<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post - LinkUp</title>

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
        }

        header h2{
            font-size:28px;
        }

        .container{
            width:650px;
            margin:40px auto;
        }

        .card{
            background:white;
            padding:30px;
            border-radius:12px;
            box-shadow:0 4px 12px rgba(0,0,0,.1);
        }

        h1{
            color:#0A66C2;
            text-align:center;
            margin-bottom:25px;
        }

        textarea{
            width:100%;
            height:180px;
            padding:15px;
            border:1px solid #ccc;
            border-radius:8px;
            resize:none;
            font-size:16px;
            outline:none;
        }

        textarea:focus{
            border-color:#0A66C2;
        }

        .buttons{
            display:flex;
            justify-content:space-between;
            margin-top:20px;
        }

        .btn{
            padding:12px 24px;
            border:none;
            border-radius:8px;
            text-decoration:none;
            font-size:15px;
            font-weight:bold;
            cursor:pointer;
        }

        .btn-back{
            background:#e4e6eb;
            color:#333;
        }

        .btn-back:hover{
            background:#d4d6da;
        }

        .btn-publish{
            background:#0A66C2;
            color:white;
        }

        .btn-publish:hover{
            background:#084b91;
        }

        .error{
            color:red;
            margin-top:8px;
            font-size:14px;
        }

    </style>

</head>
<body>

<header>
    <h2>LinkUp</h2>
</header>

<div class="container">

    <div class="card">

        <h1>Créer une nouvelle publication</h1>

        <form action="{{ route('posts.store') }}" method="POST">

            @csrf

            <textarea
                name="content"
                placeholder="Exprimez-vous..."
            >{{ old('content') }}</textarea>

            @error('content')
                <p class="error">{{ $message }}</p>
            @enderror

            <div class="buttons">

                <a href="{{ route('feed.index') }}" class="btn btn-back">
                    Retour
                </a>

                <button type="submit" class="btn btn-publish">
                    Publier
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>