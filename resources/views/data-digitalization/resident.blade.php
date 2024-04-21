<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/css/auth/app.css')
    <title>RWIS | Resident</title>
</head>

<body>

    <form action="{{ url('auth/logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
    
</body>

</html>
