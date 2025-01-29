<div>
    <div class="px-4 py-2 bg-gray-200">
        <span class="text-gray-500 text-md">Home / <span class="text-blue-900">Truck List</span></span>
    </div>

    <section class="mt-10">
        <div class="w-full px-6 mx-auto mt-6">
            <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg dark:bg-gray-800 p-4">

                <!-- FILTER SECTION -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

                    <!-- Start Date -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Start Date</label>
                        <input wire:model="startDate" type="date"
                            class="block w-full p-2 mt-1 text-sm border rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- End Date -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">End Date</label>
                        <input wire:model="endDate" type="date"
                            class="block w-full p-2 mt-1 text-sm border rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- LSP Filter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">LSP</label>
                        <select wire:model.live="selectedLsp"
                            class="block w-full p-2 mt-1 text-sm border rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">All LSPs</option>
                            @foreach ($lsps as $lsp)
                                <option value="{{ $lsp->id }}">{{ $lsp->lsp_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <h3 class="block text-sm font-medium text-gray-700">Total Count {{ $count }}</h3>
                    </div>


                </div>

                <!-- ACTION BUTTONS -->
                <div class="flex flex-wrap justify-between items-center mt-6">

                    <!-- Reset Filters -->
                    <button wire:click="resetFilters"
                        class="px-4 py-2 text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:ring-4 focus:ring-gray-300">
                        Reset Filters
                    </button>

                    <!-- Export Data -->
                    <button wire:click="exportData"
                        class="px-4 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-300">
                        Export Data
                    </button>

                    <!-- Search Input -->
                    <div class="relative w-60">
                        <input wire:model.live.debounce.300ms="search" type="text"
                            class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Search">
                    </div>

                </div>

            </div>

            <!-- TABLE DATA -->
            <div class="overflow-x-auto mt-6">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th class="px-4 py-3">LSP Name</th>
                            <th class="px-4 py-3">Truck Number</th>
                            <th class="px-4 py-3">Driver Name</th>
                            <th class="px-4 py-3">Truck Type</th>
                            <th class="px-4 py-3">Truck Size</th>
                            <th class="px-4 py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($query as $truck)
                            <tr class="border-b">
                                <td class="px-4 py-3">{{ $truck->lsp->lsp_name ?? 'N/A' }}</td>
                                <td class="px-4 py-3">{{ $truck->licence_plate }}</td>
                                <td class="px-4 py-3">{{ $truck->driver_name }}</td>
                                <td class="px-4 py-3">{{ $truck->vehicle_type }}</td>
                                <td class="px-4 py-3">{{ $truck->size }}</td>
                                <td class="flex items-center justify-center">
                                    <a href="{{ route('edit.truck', $truck->id) }}" title="Edit">
                                        <x-phosphor.icons::fill.pencil-line class="w-6 h-6 mx-3 text-blue-400" />
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- PAGINATION -->
            <div class="px-3 py-4">
                {{ $query->links() }}
            </div>

        </div>
    </section>
</div>
