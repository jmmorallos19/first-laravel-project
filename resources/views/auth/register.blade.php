<x-layout>
    <form action="{{ route('register') }}" method="POST">
        {{-- To protect our Web Form --}}
        @csrf
        
        <div class="flex justify-center">
            <h1 class="mt-0 mb-10 font-bold text-2xl">Register User</h1>
        </div>
        
        <!-- Name -->
        <label for="name">Name:</label>
        <input 
          type="text" 
          id="name" 
          name="name" 
          {{-- old('input name') - ginagamit para hindi mawala ang laman ng input kapag nagkakaroon ng error at vinavalidate --}}
          value="{{ old('name' )}}"     
          required
        >      
        <!-- validation errors -->
        @error('name')
            <ul class="px-3 py-2 bg-red-100 mt-1 mb-3">
                <li class="my-2 text-red-500">{{ $message }}</li>
            </ul>
        @enderror
        

        <!-- Email -->
        <label for="email">Email:</label>
        <input 
          type="email" 
          id="email" 
          name="email" 
          value="{{ old('email' )}}"
          required
        >      
        <!-- validation errors -->
        @error('email')
            <ul class="px-3 py-2 bg-red-100 mt-1 mb-3">
                <li class="my-2 text-red-500">{{ $message }}</li>
            </ul>
        @enderror


        <!-- Password -->
        <label for="password">Password:</label>
        <input 
          type="password" 
          id="password" 
          name="password" 
          required
        >      
        <!-- validation errors -->
        @error('password')
            <ul class="px-3 py-2 bg-red-100 mt-1 mb-3">
                <li class="my-2 text-red-500">{{ $message }}</li>
            </ul>
        @enderror


        <!-- Password -->
        <label for="password_confirmation">Password Confirmation:</label>
        <input 
          type="password" 
          id="password_confirmation" 
          name="password_confirmation" 
          required
        >
      
        <button type="submit" class="btn mt-4">Register</button>

      </form>
</x-layout>