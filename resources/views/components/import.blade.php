<link rel="icon" type="image/x-icon" href="{{ asset("./favicon.png")}}">

@vite(['resources/css/app.css', 'resources/js/app.js'])
{{-- @if(Auth::check())
@else
@vite(['resources/css/app.css'])
@endif --}}