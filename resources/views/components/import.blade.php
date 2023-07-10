<script>
    if (!localStorage.getItem("secret")) {
        localStorage.setItem("secret", "{{ session('token')}}");
    }
    window.Laravel = {
        csrfToken: '{{ csrf_token() }}'
    }
    @auth
        window.isAuth=true
        window.user = @json(auth()->user())
    @else
        window.isAuth=false
    @endauth
    </script>
<link rel="icon" type="image/x-icon" href="{{ asset("./favicon.png")}}">
@vite(['resources/css/app.css', 'resources/js/app.js'])