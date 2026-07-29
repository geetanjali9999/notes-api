@if(session('success'))
    <p>{{ session('success') }}</p>
@endif
<!-- <form method="POST" action="/register">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <button type="submit">Register</button>
    <div>Already have an account? <a href="/login">Login here</a></div>
</form> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Notes App</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" >

    @vite(['resources/css/app.css','resources/css/login.css', 'resources/js/app.js'])


</head>
<body>
    @if ($errors->any())
    <div class="m-0">
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    </div>
@endif
    <div class="my-container">
        <div class="first-div d-flex justify-content-center">
            <img src="{{ asset('images/logo/app_logo.svg') }}" class="img-fluid" alt="Notes App Logo" width="70">
        </div>
    
    <div class="second-div">
        <h2 class="text-center title">Notes App Registration</h2>

        <form method="POST" action="/register">
            @csrf
            @error('name')
                <p>{{ $message }}</p>
            @enderror
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                <label for="name">Name</label>
            </div>

            @error('email')
                <p>{{ $message }}</p>
            @enderror
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                <label for="email">Email</label>
            </div>

            @error('password')
                <p>{{ $message }}</p>
            @enderror
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password"
                    class="form-control"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Confirm Password"
                    required>

                <label for="password_confirmation">Confirm Password</label>
            </div>

            <div class="d-flex justify-content-center align-items-center">
                <button type="submit" class="btn btn-primary ">Register</button>
            </div>
            <span class="fs-12">Already have an account? <a href="/login">Login here</a></span>
        </form>
    </div>
</div>
</body>
</html>