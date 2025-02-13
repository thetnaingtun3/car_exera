<div>
    <!-- Header -->
    <div class="px-4 py-2 bg-gray-200">
        <span class="text-gray-500 text-md">Home / <span class="text-blue-900">Car Registration QR Code
                History</span></span>
    </div>

    <section class="mt-10">
        <div class="w-full px-6 mx-auto mt-6">
            <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg dark:bg-gray-800 p-6">

                <!-- FILTER SECTION -->

                <h2 class="text-lg font-semibold text-gray-700 mb-4">Total Count {{ $count }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

                    <!-- Start Date -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Start Date (MM/DD/YYYY)</label>
                        <input wire:model.live="startDate" type="date"
                               class="block w-full p-2 mt-1 text-sm border rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- End Date -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">End Date (MM/DD/YYYY) </label>
                        <input wire:model.live="endDate" type="date"
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

                    <!-- Customer Filter (Disable if no LSP selected) -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Customer</label>
                        <select wire:model.live="selectedCustomer"
                                class="block w-full p-2 mt-1 text-sm border rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                @if (empty($customers)) disabled @endif>
                            <option value="">All Customers</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <!-- ACTION BUTTONS -->
                <div class="flex flex-wrap justify-start gap-12 items-center mt-6">

                    <!-- Reset Filters -->
                    <button wire:click="resetFilters"
                            class="px-4 py-2 text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:ring-4 focus:ring-gray-300">
                        Reset Filters
                    </button>

                    <!-- Apply Filters -->
                {{--                    <button wire:click="applyDateFilter"--}}
                {{--                            class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">--}}
                {{--                        Apply Filters--}}
                {{--                    </button>--}}

                <!-- Export Data -->

                    <button wire:click="exportData"
                            class="px-4 py-2 text-white bg-teal-500 rounded-lg hover:bg-teal-600 focus:ring-4 focus:ring-teal-300">
                        Export Data
                    </button>

                    <!-- Search Input -->

                    <div class="relative w-[23rem]">
                        <input wire:model.live.debounce.300ms="search" type="text"
                               class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Search">
                    </div>

                </div>

                <div class="relative overflow-hidden  mt-8">
                    <!-- Buttons for Select/Remove All & Export -->
                    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                        <div class="flex flex-wrap gap-2">
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
                                Selected Print QR Codes
                            </button>
                            <button wire:click="getChangeDateUrl"
                                    id="ChangeCodesButton"
                                    class="px-4 py-2 text-white bg-orange-500 rounded-lg hover:bg-purple-600 focus:ring-4 focus:ring-purple-300">
                                Back Date Change Date
                            </button>

                        </div>

                        <!-- Select Range Inputs -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 w-full md:w-auto">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Start Range</label>
                                <input wire:model="rangeStart" type="number" min="1"
                                       class="block w-full p-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                                       placeholder="Start Range">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">End Range</label>
                                <input wire:model="rangeEnd" type="number" min="1"
                                       class="block w-full p-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                                       placeholder="End Range">
                            </div>

                            <div class="flex items-end">
                                <button wire:click="selectRangeByDynamic"
                                        class="px-4 py-2 w-full text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-300">
                                    Select Range
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="overflow-x-auto mt-6">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                    <button id="exportExcelButton"
                            class="px-4 py-2 text-white bg-teal-500 rounded-lg hover:bg-teal-600 focus:ring-4 focus:ring-teal-300">
                        Export to Excel
                    </button>


                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="px-4 py-3"></th>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">LSP Name</th>
                        <th class="px-4 py-3">Truck Number</th>
                        <th class="px-4 py-3">Driver Name</th>
                        <th class="px-4 py-3">Customer Name</th>
                        <th class="px-4 py-3">Order Number</th>
                        <th class="px-4 py-3">Truck Type</th>
                        <th class="px-4 py-3">QR Code Date</th>
                        <th class="px-4 py-3">Register Date</th>
                        <th class="px-4 py-3">Time</th>
                        <th class="px-4 py-3 text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($registrations as $key => $user)
                        <tr class="border-b">
                            <td class="px-4 py-2">
                                <input type="checkbox" wire:model="selectedCars"
                                       value="{{ $user->id }}"
                                       class="form-checkbox">
                            </td>
                            <td class="px-4 py-3">{{  $dynamic++ }}</td>

                            <td class="px-4 py-3">{{ $user->lsp->lsp_name }}</td>
                            <td class="px-4 py-3">


                                @if ($user->car_id == null)
                                    {{ $user->licence_plate }}
                                @else
                                    {{ $user->truck->licence_plate }}
                                @endif


                            </td>
                            <td class="px-4 py-3">
                                @if ($user->driver_id == null)
                                    {{ $user->driver_name }}
                                @else
                                    {{ $user->truck->driver_name }}
                                @endif
                            </td>
                            <td class="px-4 py-3">{{ $user->customer->customer_name }}</td>
                            <td class="px-4 py-3">
                                @php
                                    $numbers = explode(',', $user->order_number);
                                @endphp
                                @foreach ($numbers as $number)
                                    {{ $number }}<br>
                                @endforeach
                            </td>


                            <td class="px-4 py-3">


                                @if ($user->car_id == null)
                                    {{ $user->size }}
                                @else
                                    {{ $user->truck->size }}
                                @endif

                            </td>


                            <td class="px-4 py-3">

                            {{ $user->click_date }}


                            <td class="px-4 py-3">{{ $user->created_at->format('d-m-Y') }}</td>
                            <td class="px-4 py-3">{{ $user->created_at->format('h:i:s A') }}</td>
                            <td class="flex items-center justify-center">
                                {{-- <a href="{{ route('qrcode.show', $user->id) }}" target="_blank"
                            title="Generate QR Code">
                            <x-phosphor.icons::fill.qr-code class="w-6 h-6 mx-3 text-blue-400" />
                        </a>
                        <a href="{{ route('reg.car.detials', $user->id) }}" title="View Details">
                            <x-phosphor.icons::fill.eye class="w-6 h-6 mx-3 text-blue-400" />
                        </a> --}}
                                <a class="hover:cursor-pointer" href="{{ route('qrcode.show', $user->id) }}"
                                   title="Generate QR Code">
                                    <x-phosphor.icons::fill.qr-code
                                        class="w-6 h-6 mx-3 {{ $user->status == 1 ? 'text-red-400' : 'text-blue-400' }}"/>
                                </a>
                                {{-- detials --}}
                                <a class="hover:cursor-pointer" href="{{ route('reg.car.detials', $user->id) }}"
                                   title="View Details">
                                    <x-phosphor.icons::fill.eye class="w-6 h-6 mx-3 text-blue-400"/>
                                </a>
                                <x-form.button
                                    class="bg-red-700 hover:bg-red-800"
                                    wire:confirm="Are you sure you want to delete ?"
                                    wire:click="deleteAllCarReg({{ $user->id }})">
                                    <x-phosphor.icons::regular.trash class="w-6 h-6 mx-1 text-white"/>
                                </x-form.button>


                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <!-- PAGINATION -->
            <div class="px-3 py-4">
                {{ $registrations->links() }}
            </div>

        </div>
    </section>
</div>
<script src="{{ asset('js/xlsx.full.min.js') }}"></script>


<script>

    function exportToExcel() {

        var table = document.querySelector('table');
        var ws = XLSX.utils.table_to_sheet(table);
        var wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
        XLSX.writeFile(wb, "table_data.xlsx");
    }


    // Add event listeners to export buttons
    document.addEventListener('DOMContentLoaded', function () {
        const excelButton = document.getElementById('exportExcelButton');
        const pdfButton = document.getElementById('exportPdfButton');

        if (excelButton) {
            excelButton.addEventListener('click', exportToExcel);
        }

        if (pdfButton) {
            pdfButton.addEventListener('click', exportToPDF);
        }
    });
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
