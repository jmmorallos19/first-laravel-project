<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First Project</title>
    @vite("resources/css/app.css")
</head>
<body class="text-center py-12 px-12">
    <h1>Welcome to my first laravel project</h1>
    <p>Click the button below to see member!</p>

    <a href="/members" class="btn mt-2 inline-block">See member</a>
</body>
</html>