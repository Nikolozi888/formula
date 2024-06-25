<x-admin_layout>
    <div class="container mx-auto px-4 py-6">
        <h2 class="text-xl font-semibold mb-4">All Admins</h2>
        <div class="flex items-center justify-between mb-5">
            <a href="{{ route('admin.admins.create') }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                aria-label="Add Admin">
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
                <tbody class="bg-gray-300 divide-y divide-gray-200">
                    @foreach ($admins as $key => $a)
                        <tr>
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $a->name }}</td>
                            <td class="px-6 py-4">{{ $a->username }}</td>
                            <td class="px-6 py-4">{{ $a->email }}</td>
                            <td class="px-6 py-4">{{ $a->phone }}</td>
                            <td class="px-6 py-4">{{ $a->address }}</td>
                            <td class="px-6 py-4">{{ $a->role }}</td>
                            <td class="px-6 py-4">{{ $a->created_at->format('d-m-Y') }}</td>
                            <td class="px-6 py-4">
                                <div class="flex">
                                    <a href="{{ route('admin.admins.edit', $a->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                        aria-label="Edit {{ $a->name }}">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.admins.destroy', $a->id) }}" method="POST" class="ml-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                            aria-label="Delete {{ $a->name }}">
                                            Delete
                                        </button>
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
