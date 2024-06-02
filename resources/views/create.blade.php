<!-- resources/views/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Snapmail Clone</title>
</head>
<body>
    <h1>Envoyer un message temporaire</h1>
    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif
    <form action="/" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="email">Email du destinataire:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>
        <br>
        <label for="photo">Photo:</label>
        <input type="file" id="photo" name="photo">
        <br>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>
