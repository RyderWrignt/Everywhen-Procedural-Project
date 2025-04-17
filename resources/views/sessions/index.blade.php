<!DOCTYPE html>
<html>
<head><title>All Sessions</title></head>
<body>
    <h1>All Sessions</h1>
    <table border="1" cellpadding="6">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Story ID</th>
            <th>Type</th>
            <th>Goal</th>
            <th>Noun</th>
            <th>Date</th>
        </tr>
        @foreach($sessions as $session)
        <tr>
            <td>{{ $session->id }}</td>
            <td>{{ $session->session_title }}</td>
            <td>{{ $session->story_id }}</td>
            <td>{{ $session->type }}</td>
            <td>{{ $session->goal }}</td>
            <td>{{ $session->noun }}</td>
            <td>{{ $session->date }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
