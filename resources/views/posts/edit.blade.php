<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
</head>
<body>

<h2>Edit Post</h2>

<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')

    <textarea name="content" rows="5" cols="50">{{ $post->content }}</textarea>

    <br><br>

    <button type="submit">Update</button>

</form>

<br>

<a href="{{ route('feed.index') }}">Back to Feed</a>

</body>
</html>