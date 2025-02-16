@section('chang-canning-line-two-active', 'bg-gray-100 group')
<div>
    <div class="px-4 py-2 bg-gray-200">
        <span class="text-gray-500 text-md">Home / <span class="text-blue-900">Chang Canning Line 2</span></span>
    </div>
    <section class="mt-10">

        <div class="w-full px-6 mx-auto mt-6 ">
            <!-- Start coding here -->


            <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg dark:bg-gray-800 p-4">
                <!-- Total Count -->
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Total Count {{ $count }}</h2>

                <!-- Filters Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <!-- Start Date -->
                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date (MM/DD/YYYY)
                        </label>
                        <input wire:model.live="startDate" type="date" id="start_date"
                               class="block w-full p-2 mt-1 text-sm border rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- End Date -->
                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-700">End Date (MM/DD/YYYY)
                        </label>
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
                {{--                    <div>--}}
                {{--                        <label for="production_line" class="block text-sm font-medium text-gray-700">Production--}}
                {{--                            Line</label>--}}
                {{--                        <select wire:model.live="selectedProductionLine" id="production_line"--}}
                {{--                                class="block w-full p-2 mt-1 text-sm border rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">--}}
                {{--                            <option value="">All</option>--}}
                {{--                            @foreach ($productionLines as $line)--}}
                {{--                                <option value="{{ $line }}">{{ $line }}</option>--}}
                {{--                            @endforeach--}}
                {{--                        </select>--}}
                {{--                    </div>--}}

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

                        <button wire:click="resetFilters"
                                class="px-4 py-2 text-white bg-gray-500 rounded-lg hover:bg-gray-600 focus:ring-4 focus:ring-gray-300">
                            Reset Filters
                        </button>

                        <button wire:click="exportData"
                                class="px-4 py-2 text-white bg-teal-500 rounded-lg hover:bg-teal-600 focus:ring-4 focus:ring-teal-300">
                            Export Data
                        </button>

                    </div>

                    <!-- Select / Remove All -->
                    <div class="flex space-x-2">
                        <button wire:click="allCheck"
                                class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:ring-4 focus:ring-blue-300">
                            Select All
                        </button>

                        <button wire:click="removeCheck"
                                class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600 focus:ring-4 focus:ring-red-300">
                            Remove All
                        </button>
                        <button wire:click="getPrintUrl"
                                class="px-4 py-2 text-white bg-purple-500 rounded-lg hover:bg-purple-600 focus:ring-4 focus:ring-purple-300">
                            Print Selected QR Codes
                        </button>
                        <button wire:click="getChangeDateUrl"
                                id="ChangeCodesButton"
                                class="px-4 py-2 text-white bg-orange-500 rounded-lg hover:bg-purple-600 focus:ring-4 focus:ring-purple-300">
                            Back Date Change Date
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
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                        <div>
                            <label for="start_range" class="block text-sm font-medium text-gray-700">Start Range</label>
                            <input wire:model="rangeStart" type="number" min="1" id="start_range"
                                   class="block w-full p-2 border rounded-lg" placeholder="Start Range">
                        </div>

                        <div>
                            <label for="end_range" class="block text-sm font-medium text-gray-700">End Range</label>
                            <input wire:model="rangeEnd" type="number" min="1" id="end_range"
                                   class="block w-full p-2 border rounded-lg" placeholder="End Range">
                        </div>

                        <div class="flex items-end">
                            <button wire:click="selectRangeByDynamic"
                                    class="px-4 py-2 text-white bg-green-600 rounded-lg">
                                Select Rows in Range
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto mt-4">
                <table class="w-full text-sm text-left text-gray-500">

                    <tr>
                        <th scope="col" class="px-4 py-2">
                        </th>
                        {{--                        <th scope="col" class="px-2"> ID</th> --}}

                        @include('livewire.includes.table-sortable-th', [
                            'name' => 'id',
                            'displayName' => 'Id',
                        ])
                        <th scope="col" class="">Pallet Number</th>
                        <th scope="col" class="">Product Type</th>
                        <th scope="col" class="">Production Line</th>
                        {{--                            <th scope="col" class="">Package</th> --}}
                        <th scope="col" class="">Volume</th>
                        <th scope="col" class="">Unit</th>
                        <th scope="col" class="">Total</th>
                        <th scope="col" class="">Date</th>
                        <th scope="col" class="">Time</th>


                        <th scope="col" class="px-4 py-3 text-center">
                            <span class="">Actions</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($pallets as $key => $user)
                        <tr wire:key="{{ $user->id }}" class="border-b">
                            <td class="px-4 py-2">
                                <input type="checkbox" wire:model="selectedPallets" value="{{ $user->id }}"
                                       class="form-checkbox">
                            </td>
                            <td class="px-2 ">{{ $dynamic++ }}</td>

                            <td class="">PLT - {{ $user->pallet_number }}</td>
                            <th class=""> {{ $user->product_type }}</th>

                            <td class="">{{ $user->production_line }}</td>
                            <td class="">{{ $user->volume }}</td>
                            <td class="">{{ $user->unit }}</td>
                            <td class="">{{ $user->total_amount_per_pallet }}</td>


                            <td class="">{{ $user->created_at->format('d-m-Y') }}</td>
                            <td class="">{{ $user->created_at->format('h:i:s A') }}</td>
                            <td class="flex items-center justify-center my-2">
                                <a class="hover:cursor-pointer"
                                   href="{{ route('palletqrcode.show', $user->id) }}"
                                   title="Generate QR Code">
                                    <x-phosphor.icons::fill.qr-code
                                        class="w-6 h-6 mx-3 {{ $user->status == 1 ? 'text-red-400' : 'text-blue-400' }}"/>
                                </a>
                                <x-form.button class="bg-red-700 hover:bg-red-800"
                                               wire:confirm="Are you sure you want to delete PLT - {{ $user->pallet_number }}?"
                                               wire:click="deletePallet({{ $user->id }})">
                                    <x-phosphor.icons::regular.trash class="w-6 h-6 mx-1 text-white"/>
                                </x-form.button>
                            </td>
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
<script>
    document.addEventListener('livewire:load', function () {
        document.getElementById('printQRCodesButton').addEventListener('click', function () {
            // Emit the Livewire event to get the print URL
            Livewire.emit('getPrintUrl');

            // Listen for the response and open the new tab
            Livewire.on('receivePrintUrl', (url) => {
                if (!url) {
                    alert('No pallets selected.');
                    return;
                }
                window.open(url, '_blank');
            });
        });
    });

    document.addEventListener('livewire:load', function () {
        document.getElementById('ChangeCodesButton').addEventListener('click', function () {
            // Emit the Livewire event to get the print URL
            Livewire.emit('getChangeDateUrl');

            // Listen for the response and open the new tab
            Livewire.on('receivePrintUrl', (url) => {
                if (!url) {
                    alert('No pallets selected.');
                    return;
                }
                window.open(url, '_blank');
            });
        });
    });

</script>
