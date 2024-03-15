<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>
<body class="body-style">
    @auth

    @include('mainpage')
    
    @else

    <div class="flex-class gap-10  border-black rounded-md border-solid border-8 p-8 md:w-1/2">
        <h1 class="text-3xl">REGISTER</h1>
        <form class="flex-class gap-2" action="/register" method="POST" onsubmit="return validateForm()">
            @csrf
            <label for="name">Username</label>
            <input name="name"  type="text" placeholder="Username" required>
            <label for="email">Email</label>
            <input name="email" type="text" placeholder="Email" required>
            <label for="password">Password</label>
            <input name="password" id="password" type="password" placeholder="Password" required>
            <label for="confirmpassword">Confirm Password</label>
            <input name="confirmpassword" id="confirmpassword" type="password" placeholder="Confirm Password" required>
            <button class="btn-primary m-2">Register</button>
        </form>
        <a class="text-center" href="{{ url('login') }}">Click Here if you already have an account!</a>
    </div>

    <script>
        function validateForm() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmpassword").value;

            if (password !== confirmPassword) {
                alert("Passwords do not match!");
                return false;
            }

            return true;
        }
    </script>
    
    @endauth
   
</body>
</html>
