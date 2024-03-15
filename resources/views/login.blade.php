<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="body-style">
    @auth

    @include('mainpage')
    
    @else
   
    <div class="flex-class gap-10 border-black rounded-md border-solid border-8 p-10 md:w-1/2">
        <h1 class="text-3xl">LOGIN</h1>
        <form class="flex-class gap-2" action="/login" method="POST">
            @csrf
            <label for="login-name">Username</label>
            <input name="login-name"  type="text" placeholder="Name">
            <label for="login-password">Password</label>
            <input name="login-password" type="password" placeholder="Password">
            <button class="btn-primary m-2">Login</button>
        </form>
        <a href="{{ url('register') }}">Click Here if you dont have an account!</a>
    </div>
    @endauth
</body>
</html>