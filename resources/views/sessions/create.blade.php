<!DOCTYPE html>
<html>
<head><title>Create Session</title></head>
<body>
    <h1>Create a New Session</h1>
    @if(session('success')) <p>{{ session('success') }}</p> @endif

    <form method="POST" action="/sessions">
        @csrf
        <label>Story ID:</label><br>
        <input type="text" name="story_id"><br><br>

        <label>Session Title:</label><br>
        <input type="text" name="session_title"><br><br>

        <label>Type:</label><br>
        <select name="type">
            <option value="player_session">Player Session</option>
            <option value="lore_dump">Lore Dump</option>
        </select><br><br>

        <label>Session Setting:</label><br>
        <textarea name="session_setting" rows="4" cols="40"></textarea><br><br>

        <label>Goal:</label><br>
        <select name="goal">
            <option value="random">Random</option>
            @foreach ($goals as $goal)
                <option value="{{ $goal }}">{{ $goal }}</option>
            @endforeach
        </select><br><br>

        <label>Noun:</label><br>
        <input type="text" name="noun"><br><br>

        <input type="hidden" name="goals" value="{{ json_encode($goals) }}">

        <button type="submit">Create Session</button>
    </form>
</body>
</html>
