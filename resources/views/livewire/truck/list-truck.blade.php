<div>
    <div class="px-4 py-2 bg-gray-200">
        <span class="text-gray-500 text-md">Home / <span class="text-blue-900">Truck List</span></span>
    </div>

    <section class="mt-10">
        <div class="w-full px-6 mx-auto mt-6">
            <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg dark:bg-gray-800 p-4">
                <!-- Total Count -->
                <div class="flex gap-10 items-start justify-start">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Total Count {{ $count }}</h2>
                    <a href="{{ route('create.truck') }}"
                        class="px-4 py-2 text-white bg-indigo-500 rounded-lg hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300">
                        Create</a>
                    <a href="{{ route('import.truck') }}"
                        class="px-4 py-2 text-white bg-emerald-500 rounded-lg hover:bg-emerald-600 focus:ring-4 focus:ring-emerald-300">
                        Import</a>
                    <button wire:click="exportData"
                        class="px-4 py-2 text-white bg-teal-500 rounded-lg hover:bg-teal-600 focus:ring-4 focus:ring-teal-300">
                        Export Data
                    </button>
                </div>

                <!-- FILTER SECTION -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

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

                </div>

                <!-- ACTION BUTTONS -->
                <div class="flex flex-wrap justify-between items-center mt-6">

                    {{--                    <!-- Reset Filters --> --}}
                    {{--                    <button wire:click="resetFilters" --}}
                    {{--                        class="px-4 py-2 text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:ring-4 focus:ring-gray-300"> --}}
                    {{--                        Reset Filters --}}
                    {{--                    </button> --}}
                    {{--                    <!-- Apply Filters --> --}}
                    {{--                    <button wire:click="applyDateFilter" --}}
                    {{--                        class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300"> --}}
                    {{--                        Apply Filters --}}
                    {{--                    </button> --}}


                    <!-- Export Data -->

                    <!-- Search Input -->

                    <div class="relative w-[21rem]">
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
                            <th class="px-4 py-3">ID </th>
                            <th class="px-4 py-3">LSP Name</th>
                            <th class="px-4 py-3">Truck Number</th>
                            <th class="px-4 py-3">Driver Name</th>
                            <th class="px-4 py-3">Truck Size</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 text-start">Creation Date</th>
                            <th class="px-4 py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($query as $key => $truck)
                            <tr class="border-b">
                                <td class="px-4 py-3">{{ ++$key }}</td>
                                <td class="px-4 py-3">{{ $truck->lsp->lsp_name ?? 'N/A' }}</td>
                                <td class="px-4 py-3">{{ $truck->licence_plate }}</td>
                                <td class="px-4 py-3">{{ $truck->driver_name }}</td>
                                <td class="px-4 py-3">{{ $truck->size }}</td>
                                @if ($truck->status == 'active')
                                    <td class="px-4 py-3 font-medium text-green-500">{{ $truck->status }}</td>
                                @else
                                    <td class="px-4 py-3 font-medium text-red-500">{{ $truck->status }}</td>
                                @endif

                                <td class="px-4 py-3">{{ $lsp->created_at->format('d-m-Y ') }}</td>
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
