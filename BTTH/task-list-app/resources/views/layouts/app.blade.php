<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Task List App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('tasks.index') }}">Task List</a>
        <a class="btn btn-primary" href="{{ route('tasks.create') }}">Thêm mới</a>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>
