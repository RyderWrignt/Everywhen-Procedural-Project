<!DOCTYPE html>
<html>
<head><title>Create Story</title></head>
<body>
    <h1>Create a New Story</h1>
    @if(session('success')) <p>{{ session('success') }}</p> @endif

    <form method="POST" action="/stories">
        @csrf
        <label>Title:</label><br>
        <input type="text" name="title"><br><br>

        <label>Setting:</label><br>
        <textarea name="setting" rows="5" cols="40"></textarea><br><br>

        <button type="submit">Create Story</button>
    </form>
</body>
</html>
