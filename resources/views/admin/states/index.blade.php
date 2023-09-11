<x-admin-layout>
    <div class="flex justify-between">
        <h1 class="text-2xl font-semibold p-4">States Index</h1>
        <div class="p-4">
            <Link href="{{ route('admin.states.create') }}"
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded text-white">
            New State
            </Link>
        </div>
    </div>
    <x-splade-table :for="$states">
        @cell('action', $state)
            <div class="space-x-2">
                <Link href="{{ route('admin.states.edit', $state) }}"
                    class="px-3 py-2 text-white bg-green-400 hover:bg-green-700 rounded-md">Edit</Link>
                <Link href="{{ route('admin.states.destroy', $state) }}" method="DELETE" confirm="Delete The User"
                    confirm-text="Are you sure?" confirm-button="Yes" cancel-button="No"
                    class="px-3 py-2 text-white bg-red-400 hover:bg-red-700 rounded-md">Delete</Link>
            </div>
        @endcell
    </x-splade-table>
</x-admin-layout>
