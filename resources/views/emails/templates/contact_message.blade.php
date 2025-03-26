<!DOCTYPE html>
<html>

<head>
    <title>New Contact Message</title>
</head>

<body>
    <h2>Message Details</h2>
    <p><strong>Name:</strong> {{ $message_data['name'] }}</p>
    <p><strong>Email:</strong> {{ $message_data['email'] }}</p>
    <p><strong>Phone:</strong> {{ $message_data['phone'] }}</p>
    <p><strong>Message:</strong> {{ $message_data['message'] }}</p>
    <p><strong>Sent At:</strong> {{ $message_data['sent_at'] }}</p>

    <img src="{{ $message->embed(public_path('images/the_logo_light_mode.png')) }}" alt="Logo" style="width: 100px; margin-top: 40px;">
</body>

</html>
