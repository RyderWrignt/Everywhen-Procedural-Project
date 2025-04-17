<!DOCTYPE html>
<html>
<head><title>All Stories</title></head>
<body>
    <h1>All Stories</h1>
    <table border="1" cellpadding="6">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Setting</th>
            <th>Created</th>
        </tr>
        @foreach($stories as $story)
        <tr>
            <td>{{ $story->id }}</td>
            <td>{{ $story->title }}</td>
            <td>{{ $story->setting }}</td>
            <td>{{ $story->created_at }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
