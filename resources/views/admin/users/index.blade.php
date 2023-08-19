<x-admin-layout>
    <div class="flex justify-between">
        <h1 class="text-2xl font-semibold p-4">Users Index</h1>
        <div class="p-4">
            <Link href="{{ route('admin.users.create')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded text-white" >
           New Users
            </Link>
        </div>
    </div>
    <x-splade-table :for="$users" >
        @cell('action', $user)
        <Link href="{{route('admin.users.edit', $user)}}" class="px-3 py-2 text-white bg-green-400 hover:bg-green-700 rounded-md">Edit</Link>
        @endcell
    </x-splade-table>
</x-admin-layout>
