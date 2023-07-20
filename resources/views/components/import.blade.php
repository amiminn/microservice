<script>
    window.Laravel = {
        csrfToken: '{{ csrf_token() }}'
    }
        @auth
            localStorage.setItem("_x", "{{ session('token') }}");
            window.isAuth=true
            window.user = @json(auth()->user())
        @else
            window.isAuth=false
    @endauth
</script>
<link rel="icon" type="image/x-icon" href="{{ asset("./favicon.png")}}">
@vite(['resources/css/app.css', 'resources/js/app.js'])