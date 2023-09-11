<x-admin-layout>
    <div class="flex justify-between">
        <h1 class="text-2xl font-semibold p-4">Countries Index</h1>
        <div class="p-4">
            @role('staff')
                <Link href="{{ route('admin.countries.create') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded text-white">
                New Country
                </Link>
            @endrole
        </div>
    </div>
    <x-splade-table :for="$countries">
        @cell('action', $country)
            <div class="space-x-2">
                @can('edit country')
                    <Link href="{{ route('admin.countries.edit', $country) }}"
                        class="px-3 py-2 text-white bg-green-400 hover:bg-green-700 rounded-md">Edit</Link>
                @endcan
                <Link href="{{ route('admin.countries.destroy', $country) }}" method="DELETE" confirm="Delete The User"
                    confirm-text="Are you sure?" confirm-button="Yes" cancel-button="No"
                    class="px-3 py-2 text-white bg-red-400 hover:bg-red-700 rounded-md">Delete</Link>
            </div>
        @endcell
    </x-splade-table>
</x-admin-layout>
