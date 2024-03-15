<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update User Information</title>
    @vite('resources/css/app.css')
</head>

@include('navbar')
<body class="w-screen">
    @auth

    <div class="max-w-md mx-auto mt-10 px-4">
        <h1 class="text-center text-3xl font-bold mb-4">Update User Information</h1>
        <form class="flex flex-col gap-2" action="{{ route('user.update') }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Name</label>
            <input id="name" name="name" type="text" value="{{ auth()->user()->name }}">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ auth()->user()->email }}">
            <button class="btn-primary m-2" type="submit">Update Information</button>
        </form>   
    </div>
    
    @else

   @include('login');

    @endauth
</body>
</html>
