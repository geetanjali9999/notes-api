<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Notes App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    @include('partials.header');

    <main class="container mt-4">
        @yield('content');
    </main>

    @include('partials.footer');

</body>
</html>