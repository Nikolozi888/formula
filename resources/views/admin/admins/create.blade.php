<x-admin_layout>
    <div class="flex-1 p-10">
        <h2 class="text-2xl font-semibold mb-5">Add Admins</h2>
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form class="mb-8" method="POST" action="{{ route('admin.admins.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Admin Name</label>
                <input type="text" id="name" name="name" placeholder="Enter Name"
                    class="text-black p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('name') }}" required>
                    
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="username" class="block text-gray-700">Admin Username</label>
                <input type="text" id="username" name="username" placeholder="Enter Username"
                    class="text-black p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('username') }}" required>
                
                @error('username')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Admin Email</label>
                <input type="email" id="email" name="email" placeholder="Enter Email"
                    class="text-black p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('email') }}" required>
            
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">Admin Password</label>
                <input type="password" id="password" name="password" placeholder="Enter Password"
                    class="text-black p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
            
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-4">
                <label for="phone" class="block text-gray-700">Admin Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter Phone"
                    class="text-black p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('phone') }}" required>
                
                @error('phone')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-4">
                <label for="address" class="block text-gray-700">Admin Address</label>
                <textarea id="address" name="address" rows="3" placeholder="Enter Address"
                    class="text-black p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>{{ old('address') }}</textarea>
                
                @error('address')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            
            </div>
            
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Add News
                </button>
            </div>
        </form>
    </div>
</x-admin_layout>