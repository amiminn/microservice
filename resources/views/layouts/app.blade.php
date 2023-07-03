<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body id="app">
    <div>

        @include('components.header')

        @include('components.sidebar')

        <div class="p-4 sm:ml-64">
            <div class="mt-14">
                <router-view />
            </div>
        </div>
</body>

</html>