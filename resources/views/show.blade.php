<!-- resources/views/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Message Temporaire</title>
</head>
<body>
    <h1>Message Temporaire</h1>
    @if ($message)
        <p>{{ $message->message }}</p>
        @if ($photoPath)
            <p>Voici la photo associée au message :</p>
            <img src="{{ asset('storage/' . $photoPath) }}" alt="Photo">
        @endif
    @else
        <p>Le message n'existe pas ou a été supprimé.</p>
    @endif
</body>
</html>
