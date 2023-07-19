<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    @include('components.import')
</head>

<body id="app">
    @auth
        <div>
            <header-page></header-page>        
            <side-bar></side-bar>
        </div>
        <div class="p-4 sm:ml-64 bg-gray-50 min-h-screen">
            <div class="mt-14">
                <router-view />
            </div>
        </div>
    @else
        <router-view />
    @endauth
</body>

</html>