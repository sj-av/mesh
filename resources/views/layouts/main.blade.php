<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="css/app.css">
    <title>Products Viewer</title>
</head>

<body>
    <div id="app">
        @yield('content')
    </div>
</body>
<script src="{{mix('js/app.js')}}"></script>

</html>