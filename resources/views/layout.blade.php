<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
    <title>Laravel</title>
</head>

<body>
    <x-flash-message />
    <header>
        <div class="logo">
            <a href="/"><span>EN</span>-Market</a>
        </div>
        <nav>
            <ul>
                <li>
                    @auth
                        {{-- <span><i class="fa-solid fa-user" style="font-size: 1.25rem"></i> {{ auth()->user()->name }}</span> --}}
                        <a href="/manage">Manage Goods</a>
                        <form method="POST" action="/logout" style="display: inline-block">
                            @csrf
                            <button class="header-btn">Logout</button>
                        </form>
                    @else
                        <a href="/login">Login</a>
                        <a class="header-btn" href="/register">Register</a>
                    @endauth
                </li>
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>
