<script>
    window.Laravel = {
        csrfToken: '{{ csrf_token() }}'
    }

</script>
<link rel="icon" type="image/x-icon" href="{{ asset("./favicon.png")}}">
@vite(['resources/css/app.css', 'resources/js/app.js'])