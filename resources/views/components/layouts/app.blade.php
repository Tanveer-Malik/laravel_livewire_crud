<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>{{ $title ?? 'Page Title' }}</title>
</head>

<body>
    <div class="container">
        <livewire:nav-bar />
        <livewire:admin-notifications />
        {{ $slot }}
    </div>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        // Pusher.logToConsole = true;

        var pusher = new Pusher('3bc8e471e860cd63036e', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('admin-notifications');
        channel.bind('customer.created', function(data) {
            alert(JSON.stringify(data));
        });
    </script>
</body>

</html>
