<!DOCTYPE html>
<html>
<head>
    <title>Test Email</title>
</head>
<body>
    <img src="{{ $message->embed(public_path('images/the_logo_light_mode.png')) }}" alt="Logo">

    <h1>Hello!</h1>
    <p>This is a test email with dynamic data.</p>
    <p>Here is your custom message: {{ $customMessage }}</p>
</body>
</html>
