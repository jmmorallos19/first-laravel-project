<x-layout>
    <form action="{{ route('members.store') }}" method="POST">
        {{-- To protect our Web Form --}}
        @csrf
        
        <!-- Member Name -->
        <label for="name">Member Name:</label>
        <input 
          type="text" 
          id="name" 
          name="name" 
          {{-- old('input name') - ginagamit para hindi mawala ang laman ng input kapag nagkakaroon ng error at vinavalidate --}}
          value="{{ old('name' )}}"     
          required
        >
        

        <!-- Member Strength -->
        <label for="age">Age:</label>
        <input 
          type="number" 
          id="age" 
          name="age" 
          value="{{ old('age' )}}"
          required
        >
        {{-- Paraan ng paglalagay ng error sa specific input --}}
        {{-- @error('age')
            <span class="text-red-500 text-sm">{{ $message }}</span> <br>
        @enderror --}}
      
        <!-- Member Strength -->
        <label for="skill">Member Skill (0-100):</label>
        <input 
          type="number" 
          id="skill" 
          name="skill" 
          value="{{ old('skill')}}"
          required
        >
        {{-- Paraan ng paglalagay ng error sa specific input --}}
        {{-- @error('skill')
            <span class="text-red-500 text-sm">{{ $message }}</span> <br>
        @enderror --}}
      
      
        <!-- Member Bio -->
        <label for="bio">Biography:</label>
        <textarea
          rows="5"
          id="bio" 
          name="bio" 
          required
        > {{ old('bio')}} </textarea>
      
        <!-- select a Department -->
        <label for="department_id">Department:</label>
        <select id="department_id" name="department_id" required>
          <option value="" disabled selected>Select a department</option>
          @foreach ($departments as $department)
              <option value="{{ $department->id }}" 
                {{-- Gumawa ng condition para hindi mawala ang na select na department kapag vinalidate --}}
                {{-- if-else statement using ternary operator --}}
                {{$department->id == old('department_id') ? 'selected' : '' }}>
                {{$department->name}}
              </option>
          @endforeach

        </select>
      
        <button type="submit" class="btn mt-4">Create Member</button>
      
        <!-- validation errors -->
        @if ($errors->any())
          <ul class="px-3 py-2 bg-red-100">
            @foreach ($errors->all() as $error)
              <li class="my-2 text-red-500">{{ $error }}</li>
            @endforeach
          </ul>
        @endif
        
      </form>
</x-layout>