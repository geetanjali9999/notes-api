@if(session('success'))
    <p>{{ session('success') }}</p>
@endif
<form  method="post" action="/login">

    @csrf
    @error('email')
        <p>{{ $message }}</p>
    @enderror

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
    
    <button type="submit">Login</button>
    <div>Don't have an account? <a href="/register">Register here</a></div>
</form>