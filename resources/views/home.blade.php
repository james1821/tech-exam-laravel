<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    @vite('resources/css/app.css')
</head>
<body >
    @auth
  
    @include('mainpage')
    
    @else

    @include('login')
   

    
    @endauth
   
</body>
</html>
