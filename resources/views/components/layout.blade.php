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
        <div class="fixed top-0 w-full bg-white z-10">
            @include('components.navigation')
        </div>
        <main class="mt-20 bg-green-100">
            {{ $slot }}
        </main>
    </body>
</html>