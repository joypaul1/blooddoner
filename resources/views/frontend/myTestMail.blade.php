<!DOCTYPE html>
<html>
<head>
    <title>{{ $info->name??'-' }}</title>
</head>
<body>
    {{-- @dd($details); --}}
    <h1>{{ $details['name'] }}</h1>
    <p>{{ $details['email'] }}</p>
    <p>{{ $details['mobile'] }}</p>
    <p>{{ $details['sms'] }}</p>
    <p>Thank you</p>
</body>
</html>
