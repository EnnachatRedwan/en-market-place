<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <title>Laravel</title>
</head>

<body>
    <header>
        <div class="logo">
            <span>EN</span>-Jobs
        </div>
        <nav>
            <ul>
                <li>
                    <a href="/login">Login</a>
                    <a class="btn-register" href="/register">Register</a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        @include('partials._hero')
    </main>
</body>

</html>
