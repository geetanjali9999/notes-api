@if(session('success'))
    <p>{{ session('success') }}</p>
@endif
<form method="POST" action="/register">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <button type="submit">Register</button>
    <div>Already have an account? <a href="/login">Login here</a></div>
</form>