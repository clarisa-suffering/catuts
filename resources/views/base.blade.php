<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>@yield('title')</title>
    
    <style>
        html, body {
            height: 100%; /* Ensure full height */
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        body {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        footer {
            margin-top: auto; /* Push the footer to the bottom */
        }
    </style>

</head>
<body>
    @include('header')
    @yield('content')
    @include('footer')
</body>
</html>