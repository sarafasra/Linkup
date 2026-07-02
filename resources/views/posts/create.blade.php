<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
</head>
<body>

    <h2>Create New Post</h2>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <textarea name="content" placeholder="Write your post"></textarea>
        <br><br>

        <button type="submit">Publish</button>

    </form>

</body>
</html>