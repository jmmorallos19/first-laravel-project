@props(['highlight' => false, 'success'])

<div @class(['highlight' => $highlight, 'card', 'success' => $success])>
    {{ $slot }}
    {{-- <a href="{{ $attributes -> get("href") }}">View Details</a> --}}
    <a {{ $attributes }} class="btn">View Details</a>
</div>