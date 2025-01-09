<x-layout> 
 {{-- Blade if direcyive --}}
 {{-- @if (!$greeting == "hello")
 <p>Hello User!</p>
     @endif --}}

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