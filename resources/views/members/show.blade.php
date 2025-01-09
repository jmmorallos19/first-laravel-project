<x-layout> 
    <h1>Member Details</h1>
    <div class="bg-gray-200 p-4 rounded">
        <p><strong>Age: </strong>{{ $member->age }} years old</p>
        <p><strong>Skill Level: </strong>{{ $member->skill }}</p>
        <p><strong>About me:</strong></p>
        <p>{{ $member->bio }}</p>

        <div class="mt-10">
            <h3 class="mb-0">DepartmentSection</h3>
            <p><strong>Company: </strong>{{ $member->department->name }}</p>
            <p><strong>Location:</strong> {{ $member->department->location }}</p>
            <p><strong>Description:</strong> {{ $member->department->description }}</p>
        </div>
    </div>

    <form action="{{ route('members.destroy', $member->id)}}" method="post">
        @csrf
        @method('DELETE')

        <button class="btn my-4" type="submit">Delete</button>
    </form>
</x-layout> 