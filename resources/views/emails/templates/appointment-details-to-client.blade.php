<!DOCTYPE html>
<html>

<head>
    <title>Your Appointment Details</title>
</head>

<body>
    <h2>Your Appointment Details</h2>
    <p><strong>Name:</strong> {{ $bookingDetails['name'] }}</p>
    <p><strong>Email:</strong> {{ $bookingDetails['email'] }}</p>
    <p><strong>Phone:</strong> {{ $bookingDetails['phone'] }}</p>
    <p><strong>Address:</strong> {{ $bookingDetails['address'] }}</p>
    <p><strong>Service:</strong> {{ $bookingDetails['service'] }}</p>
    <p><strong>Date:</strong> {{ $bookingDetails['date'] }}</p>
    <p><strong>Time:</strong> {{ $bookingDetails['time'] }}</p>
    <p><strong>Your Need:</strong> {{ $bookingDetails['needs'] }}</p>

    <img src="{{ $message->embed(public_path('images/the_logo_light_mode.png')) }}" alt="Logo" style="width: 100px; margin-top: 40px;">
    <p><a href="{{ $bookingDetails['unsubscribe_link'] }}">Unsubscribe</a></p>
</body>

</html>
