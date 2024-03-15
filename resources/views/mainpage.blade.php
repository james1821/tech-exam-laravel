<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main Page</title>
    @vite('resources/css/app.css')
    
</head>
<body >
    @include('navbar')
    <div class="flex-class">
       
        <div class="flex flex-wrap justify-center items-center gap-5">
            <div class="flex-class">
                <h1 class="text-3xl font-bold md:text-6xl p-5">My posts</h1>
                <a href="{{ url('createpost') }}" class="btn-primary">Create A New Post</a>
            </div>
           
            @foreach($posts as $post)
            <div class="bg-gray-300 w-full h-full rounded-lg ">
                    <h3 class="text-2xl text-center p-5"> <b>{{$post['title']}}</b> </h3>
                    <h3 class="text-xl text-justify px-5"> <b>Date:</b>  {{ \Carbon\Carbon::parse($post['created_at'])->format('jS \of F Y h:i:s A') }}</h3>
                    <p class="text-xl text-justify p-10">{{$post['body']}}</p> 
                <div class="flex gap-2 items-start justify-center">
                    <a href="/edit-post/{{ $post->id }}" class="btn-warning">Update</a>
                    <form action="/delete-post/{{ $post->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                        <button class="btn-danger">Delete</button>
                    </form>    
                </div>     
             </div>
            @endforeach
        </div>

      

    </div>

   
</body>
</html>