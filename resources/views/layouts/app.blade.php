<!DOCTYPE html>
<html>
<head>
    <title>Laravel Blog</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <style>
        .container { max-width: 900px; margin: 30px auto; }
        .btn { padding: 5px 10px; background: #007bff; color: #fff; border: none; border-radius: 3px; text-decoration: none; }
        .btn-info { background: #17a2b8; }
        .mb-2 { margin-bottom: 10px; }
        img { margin: 5px; border-radius: 4px; }
    </style>
    @stack('styles')
</head>
<body>
    @yield('content')
    @stack('scripts')
</body>
</html>