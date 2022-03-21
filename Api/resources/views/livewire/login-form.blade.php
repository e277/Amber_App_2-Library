<div>
    <div class="flex items-center justify-center">
        <form wire:submit.prevent='loginUser' class="bg-gray-200 border-gray-700 p-12 rounded-xl shadow-xl">
            
            @csrf
            
            <h1 class="text-blue-900 font-bold text-3xl flex justify-center border-b-2 py-2 mb-4">Login</h1>
            
            @if (session()->has('message'))
                <div class="text-red-600">
                    {{ session('message') }}
                </div>
            @endif
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-normal mb-2">Email</label>
                <input
                    wire:model='email'
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="email"
                    placeholder="Email"
                />
                @error('email')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-normal mb-2">Password</label>
                <input
                    wire:model='password'
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    type="password"
                    placeholder="Password"
                />
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="px-4 py-2 rounded text-white inline-block shadow-lg bg-blue-500 hover:bg-blue-600 focus:bg-blue-700">
                    Login
                </button>
            </div>
        </form>
    </div>
</div>
