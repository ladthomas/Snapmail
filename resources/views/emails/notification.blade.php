<!-- resources/views/emails/notification.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>SnapMessage</title>
</head>
<body>
    <p>Bravo tu as reçu un snapMail ! &#128513; </p>
    <a href="{{ url('/message/' . $token) }}">Clique Ici</a>
</body>
</html>
