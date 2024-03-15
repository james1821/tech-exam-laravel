<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>
    @vite('resources/css/app.css')
</head>

@include('navbar')
<body class="w-screen">
    @auth

    <div class="flex-class gap-2 ">
        <h1 class="text-3xl font-bold">Update Post</h1>
        <form class="flex-class gap-2" action="/edit-post/{{$post->id}}" method="POST">
            @csrf
            @method('PUT')
            <label for="title">Title</label>
            <input name="title" type="text" value="{{$post->title}}">
            <label for="body">Body</label>
            <textarea  class="w-screen" name="body" type="text">{{$post->body}}</textarea>
            <button class="btn-primary m-2" >Update Post</button>
        </form>   
    </div>
    
    @else

   @include('login');

    @endauth
</body>
</html>

