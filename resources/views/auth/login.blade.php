@if(session('success'))
    <p>{{ session('success') }}</p>
@endif


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Notes App</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" >

    @vite(['resources/css/app.css','resources/css/login.css', 'resources/js/app.js'])

</head>
<body>
    
    <div class="my-container">
        <!-- <div class="firdt-div">
            <img src="{{ asset('images/logo/app_logo.svg') }}"  class="d-block mx-auto" alt="Notes App Logo" width="70">
        </div> -->
        
        <div class="first-div d-flex justify-content-center">
            <img src="{{ asset('images/logo/app_logo.svg') }}" class="img-fluid" alt="Notes App Logo" width="70">
        </div>
        
        <div class="second-div">

         <h2 class="text-center title">Notes App Login</h2>

            <form  method="post" action="/login">

                @csrf
                @error('email')
                    <p>{{ $message }}</p>
                @enderror

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                    <label for="email">Email</label>
                </div>

                <!-- <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>
                 -->
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" value="true>
                    <label for="remember">Remember Me</label>
                </div>
                <!-- <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br><br> -->

                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-primary ">Login</button>
                </div>
                <span class="fs-12">Don't have an account? <a href="/register">Register here</a></span>
            </form>

        </div>
        
    </div>
   
    
</body>
</html>