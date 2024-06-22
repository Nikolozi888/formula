<x-admin_layout>
    <div class="container mx-auto px-4 py-6">
        <h2 class="text-xl font-semibold mb-4">All Admins</h2>
        <div class="flex items-center justify-between mb-5">
            <a href="/admin/admins/create"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Add Admin
            </a>
        </div>

        <div class="overflow-x-auto rounded-lg">
            <table class="w-full whitespace-nowrap">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SL</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Username</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Since From</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-300 divide-y divide-gray-200 p-5">
                    
                    @foreach ($admins as $key => $admin)
                        <tr class="m-5">
                            <td class="text-black px-6 py-4 whitespace-nowrap">{{ $key + 1 }}</td>
                            <td class="text-black text-lg font-semibold">{{ $admin->name }}</td>
                            <td class="text-black px-6 py-4 whitespace-nowrap">{{ $admin->username }}</td>
                            <td class="text-black px-6 py-4 whitespace-nowrap">{{ $admin->email }}</td>
                            <td class="text-black px-6 py-4 whitespace-nowrap">{{ $admin->phone }}</td>
                            <td class="text-black px-6 py-4 whitespace-nowrap">{{ $admin->address }}</td>
                            <td class="text-black px-6 py-4 whitespace-nowrap">{{ $admin->role }}</td>
                            <td class="text-black px-6 py-4 whitespace-nowrap">{{ $admin->created_at->format('d-m-Y') }}</td>
                            <td class="text-black px-6 py-4 whitespace-nowrap">
                                <div class="flex">
                                    <a href="/admin/admins/{{ $admin->id }}/edit" class="mr-4 bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit</a>
                                    <form action="/admin/admins/{{ $admin->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin_layout>
