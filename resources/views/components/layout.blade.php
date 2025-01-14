<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jmark</title>

    @vite("resources/css/app.css")

</head>
<body>
    {{-- Para mag display ang message --}}
    @if (session('success'))
        <div id="flash" class="p-4 text-center bg-green-50 text-green-500 font-bold">
            <p>{{session('success')}}</p>
        </div>

        {{-- Para mawala ang message sa loob ng 3seconds --}}
        <script>
            // Wait for the document to load
            document.addEventListener("DOMContentLoaded", function() {
                // Set a timeout of 3 seconds (3000 milliseconds)
                setTimeout(function() {
                    // Select the flash message and hide it
                    const flashMessage = document.getElementById('flash');
                    if (flashMessage) {
                        flashMessage.style.display = 'none';
                    }
                }, 3000); // 3000 milliseconds = 3 seconds
            });
        </script>
    @endif

    <header>
        <nav>
            <h1>Jmark.</h1>

            @guest
                <a href="{{ route('show.login') }}" class="btn mt-2 inline-block">Login</a>
                <a href="{{ route('show.register') }}" class="btn mt-2 inline-block">Register</a>
            @endguest
 
            @auth
            <span>
                Hi there, {{ Auth::user()->name }}
            </span>
            <a href="{{ route('members.index') }}">All Members</a>
            <a href="{{ route('members.create') }}">Create Member</a>
            <form action="{{ route('logout') }}" class="flex items-end p-0" method="POST">
                @csrf

                <button class="btn" type="submit">Logout</button>
            </form>
            @endauth

        </nav>
    </header>

    <main class="container">
        {{ $slot }}
    </main>
</body>
</html>