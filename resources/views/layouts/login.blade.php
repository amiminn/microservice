<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @include('components.import')
</head>

<body>
    <form action="{{ route('to-login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>username</label>
            <input type="text" name="username" class="form-input">
        </div>
        <div class="mb-3">
            <label>password</label>
            <input type="password" name="password" class="form-input">
        </div>
        <button type="submit" class="btn">login</button>
    </form>
</body>

</html>