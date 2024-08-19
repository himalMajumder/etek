<!DOCTYPE html>
<html>
<head>
    <title>Test Admin URL</title>
</head>
<body>
    <h1>Test Admin URL</h1>
    <p>ADMIN_URL: {{ env('ADMIN_URL') }}</p>
    <p>Config ADMIN_URL: {{ config('app.admin_url') }}</p>
</body>
</html>
