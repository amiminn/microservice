<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    @include('components.import')
</head>

<body id="app">
    @include('components.header')
    @include('components.sidebar')
    <div class="p-4 sm:ml-64">
        <div class="mt-14">
            <router-view />
        </div>
    </div>
</body>

</html>