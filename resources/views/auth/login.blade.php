<x-layout>
    <form action="{{ route('login') }}" method="POST">
        @csrf

        @if ($errors->any())
            <ul class="px-4 py-2 bg-red-100">
                @foreach ($errors->all() as $error)
                    <li class="my-2 text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="flex justify-center">
            <h1 class="mt-0 mb-10 font-bold text-2xl">Login</h1>
        </div>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <button class="btn" type="submit">Login</button>
    </form>
</x-layout>