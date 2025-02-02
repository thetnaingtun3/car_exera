@section('loading-active', 'bg-gray-100 group')
<div>
    <div class="px-4 py-2 bg-gray-200">
        <span class="text-gray-500 text-md">Home / <span class="text-blue-900">Loading Area History</span></span>
    </div>
    <section class="mt-10">

        <div class="w-full px-6 mx-auto mt-6 ">
            <!-- Start coding here -->


            <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg dark:bg-gray-800 p-4">
                <!-- Total Count -->
                <div class="flex gap-10 items-start justify-start">

                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Total Count {{ $count }}</h2>
                    <a href="{{ route('loading.create') }}"
                        class="px-4 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-300">Import</a>

                </div>



                <!-- Filters Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <!-- Start Date -->
                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                        <input wire:model.live="startDate" type="date" id="start_date"
                            class="block w-full p-2 mt-1 text-sm border rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- End Date -->
                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                        <input wire:model.live="endDate" type="date" id="end_date"
                            class="block w-full p-2 mt-1 text-sm border rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Start Pallet No. -->
                    <div>
                        <label for="start_pallet" class="block text-sm font-medium text-gray-700">Start Pallet
                            No.</label>
                        <input wire:model.live="startPalletNumber" type="number" min="1" step="1"
                            id="start_pallet"
                            class="block w-full p-2 mt-1 text-sm border rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter start number">
                    </div>

                    <!-- End Pallet No. -->
                    <div>
                        <label for="end_pallet" class="block text-sm font-medium text-gray-700">End Pallet
                            No.</label>
                        <input wire:model.live="endPalletNumber" type="number" min="1" step="1"
                            id="end_pallet"
                            class="block w-full p-2 mt-1 text-sm border rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter end number">
                    </div>
                </div>

                <!-- Product Type, Production Line, Volume Filters -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                    <!-- Product Type -->
                    <div>
                        <label for="product_type" class="block text-sm font-medium text-gray-700">Product
                            Type</label>
                        <select wire:model.live="selectedProductType" id="product_type"
                            class="block w-full p-2 mt-1 text-sm border rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">All</option>
                            @foreach ($productTypes as $type)
                                <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Production Line -->
                    <div>
                        <label for="production_line" class="block text-sm font-medium text-gray-700">Production
                            Line</label>
                        <select wire:model.live="selectedProductionLine" id="production_line"
                            class="block w-full p-2 mt-1 text-sm border rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">All</option>
                            @foreach ($productionLines as $line)
                                <option value="{{ $line }}">{{ $line }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Volume -->
                    <div>
                        <label for="volume" class="block text-sm font-medium text-gray-700">Volume</label>
                        <select wire:model.live="selectedVolume" id="volume"
                            class="block w-full p-2 mt-1 text-sm border rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">All</option>
                            @foreach ($volumes as $vol)
                                <option value="{{ $vol }}">{{ $vol }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Actions: Filter, Reset, Export -->
                <div class="flex flex-wrap justify-between items-center mt-6 space-x-2">
                    <div class="flex space-x-2">
                        <button wire:click="applyFilters"
                            class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                            Apply Filters
                        </button>

                        <button wire:click="resetFilters"
                            class="px-4 py-2 text-white bg-gray-500 rounded-lg hover:bg-gray-600 focus:ring-4 focus:ring-gray-300">
                            Reset Filters
                        </button>

                        <button wire:click="exportData"
                            class="px-4 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-300">
                            Export By Excel
                        </button>
                        <button wire:click="exportToPDF"
                            class="px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300">
                            Export By PDF
                        </button>
                    </div>

                    <!-- Search Box -->
                    <div class="relative w-60">
                        <input wire:model.live.debounce.300ms="search" type="text"
                            class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Search">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor"
                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto mt-4">
                <table class="w-full text-sm text-left text-gray-500">

                    <tr>

                        <th scope="px-4 py-3 " class="px-2"> ID</th>

                        <th class="px-4 py-3 ">Delivery Date</th>
                        <th class="px-4 py-3 ">Delivery Order Number</th>
                        <th class="px-4 py-3 ">LSP Name</th>
                        <th class="px-4 py-3 ">Customer Name</th>
                        <th class="px-4 py-3 ">Truck Type</th>
                        <th class="px-4 py-3 ">Truck Driver Name</th>
                        <th class="px-4 py-3 ">Product Type</th>
                        <th class="px-4 py-3 ">Volume</th>
                        <th class="px-4 py-3 ">Production Line</th>
                        <th class="px-4 py-3 ">Pallet No.</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($pallets as $key => $user)
                            <tr class="border-b">
                                <td class="px-4 py-3">{{ ++$key }}</td>

                                <td class="px-4 py-3">{{ $user->delivery_date }}</td>
                                <td class="px-4 py-3">{{ $user->delivery_order_number }}</td>

                                <td class="px-4 py-3">{{ $user->lsp_name }}</td>
                                <td class="px-4 py-3">{{ $user->customer_name }}</td>
                                <td class="px-4 py-3">{{ $user->truck_type }}</td>
                                <td class="px-4 py-3">{{ $user->truck_driver_name }}</td>
                                <td class="px-4 py-3">{{ $user->product_type }}</td>
                                <td class="px-4 py-3">{{ $user->volume }}</td>

                                <td class="px-4 py-3">{{ $user->production_line }}</td>
                                <td class="px-4 py-3">{{ $user->pallet_number }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="px-3 py-4">
                {{ $pallets->links() }}
            </div>
        </div>
    </section>
</div>
