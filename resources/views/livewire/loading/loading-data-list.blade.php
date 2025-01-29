@section('lsp-active', 'bg-gray-100 group')
<div>
    <div class="px-4 py-2 bg-gray-200">
        <span class="text-gray-500 text-md">Home / <span class="text-blue-900">Loading Data</span></span>
    </div>

    <section class="mt-10">
        <div class="w-full px-6 mx-auto mt-6">
            <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg dark:bg-gray-800 p-4">

                <!-- Filters Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <!-- Start Date -->
                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                        <input wire:model="startDate" type="date" id="start_date"
                            class="block w-full p-2 mt-1 text-sm border rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- End Date -->
                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                        <input wire:model="endDate" type="date" id="end_date"
                            class="block w-full p-2 mt-1 text-sm border rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Search -->
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700">Search</label>
                        <input wire:model.live.debounce.300ms="search" type="text" id="search"
                            class="block w-full p-2 mt-1 text-sm border rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Search LSP">
                    </div>

                    <!-- Apply & Reset Filters -->
                    <div class="flex space-x-2 items-end">
                        <button wire:click="applyDateFilter"
                            class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                            Apply Filters
                        </button>
                        <button wire:click="resetFilters"
                            class="px-4 py-2 text-white bg-gray-500 rounded-lg hover:bg-gray-600">
                            Reset Filters
                        </button>
                    </div>
                </div>

                <!-- Export Button -->
                <div class="mt-4 flex justify-end">
                    <button wire:click="exportData"
                        class="px-4 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-300">
                        Export Data
                    </button>
                </div>

                <!-- Total Count -->
                <div class="text-sm text-gray-500 mt-2">
                    <strong>Total LSPs: </strong> {{ $count }}
                </div>

                <!-- LSP Table -->
                <div class="overflow-x-auto mt-4">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-3 text-start">ID</th>
                                <th scope="col" class="px-4 py-3 text-start">LSP Name</th>
                                <th scope="col" class="px-4 py-3 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lsps as $key => $lsp)
                                <tr wire:key="{{ $lsp->id }}" class="border-b">
                                    <td class="px-4 py-3 font-medium text-gray-900">{{ ++$key }}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900">{{ $lsp->lsp_name }}</td>
                                    <td class="flex items-center justify-center my-2">
                                        <a wire:navigate href="{{ route('edit.lsp', $lsp->id) }}" title="Edit LSP">
                                            <x-phosphor.icons::fill.pencil-line class="w-6 h-6 mx-3 text-blue-400" />
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="px-3 py-4">
                    {{ $lsps->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
