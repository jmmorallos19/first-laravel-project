<x-layout> 
 {{-- Blade if direcyive --}}
 {{-- @if (!$greeting == "hello")
 <p>Hello User!</p>
     @endif --}}

    @if(session('message'))
        <div class="w-dvw py-3 flex justify-center">
            <p class="text-green-500 m-0 font-bold text-2xl">{{ session('message') }}</p>
        </div>
    @endif

    <h1>Members List</h1>
    
    <ul>
        @foreach ($members as $member)
            <li>
                <x-card href="{{route('members.show', $member->id)}}" :highlight="$member->age >= 18"  :success="$member['profit'] > 95">
                    <div>
                        <p style="font-weight: 600 !important">{{ $member->name }}</ps>
                        <p>{{ $member->department->name }}</p>
                    </div>
                </x-card>
            </li>
        @endforeach
    </ul>

    {{ $members->links() }}
</x-layout> 