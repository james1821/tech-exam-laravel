<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My CrediInformation</title>
    @vite('resources/css/app.css')
</head>

@include('navbar')
<body class="w-screen">
    @auth

    <div class="max-w-md mx-auto mt-10 px-4">
        <h1 class="text-center text-3xl font-bold mb-4">My Information</h1>
        
            <h1 class="text-2xl font-mono"><b>Name:</b> {{ auth()->user()->name }}</h1>
            <h1 class="text-2xl font-mono"><b>Email:</b> {{ auth()->user()->email }}</h1>
            
           
            <button class="w-full btn-primary m-2" type="submit"><a href="{{ url('update-user') }}">Update Information</a></button>
        
    </div>
    
    @else

   @include('login');

    @endauth
</body>
</html>
