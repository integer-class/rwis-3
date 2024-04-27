<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/css/auth/app.css')
    <title>RWIS | Login</title>
</head>

<body class="flex h-screen items-center justify-center">
    <main>
        <div class="login-container rounded-lg shadow-2xl flex w-full">

            {{-- image --}}
            <div class="w-2/3">
                <img class="rounded-l-lg" src="{{ asset('img/bg-login.png') }}" width="500" alt="">
            </div>

            {{-- form --}}
            <div class="w-1/2 flex flex-col justify-center items-center space-y-5">
                <div class="flex gap-4">
                    <img src="{{ asset('img/icon.png') }}" width="94" alt="">
                    <h1 class="text-2xl font-bold">RW 11<br>Information<br>System</h1>
                </div>
                <form action="{{ url('/auth') }}" method="POST" class="flex flex-col space-y-4 w-full form mr-3">
                    @csrf
                    @if ($errors->any())
                        <div class="bg-red-100 text-red-500 p-2 rounded-lg">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="flex flex-col space-y-1">
                        <label for="username">Username</label>
                        <input type="text" name="name" id="username"
                            class="rounded-lg border border-gray-300 p-2" placeholder="Username" autofocus>
                    </div>
                    <div class="flex flex-col space-y-1">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password"
                            class="rounded-lg border border-gray-300 p-2" placeholder="Password">
                    </div>
                    <button type="submit" class="login-btn text-white rounded-lg p-2">Login</button>
                </form>
            </div>
        </div>
    </main>
</body>

</html>
