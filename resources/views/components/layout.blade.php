<!-- resources/views/components/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>{{ $title ?? 'Veg Planner' }}</title>
        
        <!-- Fonts -->

        <!-- Scrips -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        <h1>Top Line</h1>
        <hr/>
        <main>
            {{ $slot }}
        </main>
    </body>
</html>