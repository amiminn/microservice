<script>
    window.Laravel = {
        csrfToken: '{{ csrf_token() }}'
    }
    // if (!localStorage.getItem("secret")) {
    //     localStorage.setItem("secret", "{{ session('token')}}");
    // }
    @auth
        window.isAuth=true
        window.user = @json(auth()->user())
        // window.authToken = localStorage.getItem("secret")
        @else
        // window.authToken = ""
        window.isAuth=false
    @endauth
    </script>
<link rel="icon" type="image/x-icon" href="{{ asset("./favicon.png")}}">
@vite(['resources/css/app.css', 'resources/js/app.js'])