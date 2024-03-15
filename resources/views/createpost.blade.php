<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Posts</title>
    @vite('resources/css/app.css')
</head>
@include('navbar')
<body class="body-style w-screen">

    @auth

    <div class="flex-class ">
        <h1 class="text-3xl font-bold">Create a New Post</h1>
        <form class="flex-class" action="/create-post" method="POST">
            @csrf
            <label for="title">Title</label>
            <input name="title" type="text" placeholder="Title">
            <label for="body">Body</label>
            <textarea class="w-screen" name="body" type="text" placeholder="Body"></textarea>
            <button class="btn-primary m-2">Create a New Post</button>
        </form>   
    </div>
    
    @else

   @include('login');

    @endauth
    
</body>
</html>