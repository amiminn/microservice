<script>
    window.Laravel = {
        csrfToken: '{{ csrf_token() }}',
        app_key : '{{ env("APP_KEY") }}'
    }
</script>
<link rel="icon" type="image/x-icon" href="{{ asset("./favicon.png")}}">
@vite(['resources/css/app.css', 'resources/js/app.js'])