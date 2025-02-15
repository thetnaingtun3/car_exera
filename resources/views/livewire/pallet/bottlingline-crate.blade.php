@section('pallet-active', 'bg-gray-100 group')
<div>
    <section class="py-1 bg-blueGray-50">

        <div class="w-full px-6 mx-auto mt-6 ">


            <div
                class="relative flex flex-col w-full min-w-0 mb-6 break-words border-0 rounded-lg shadow-lg bg-blueGray-100">
                <div class="px-6 py-6 mb-0 ">

                    <!-- Success/Error Message -->
                    @if (session()->has('success'))
                        <div class="mt-4 text-green-500">{{ session('success') }}</div>
                    @elseif (session()->has('error'))
                        <div class="mt-4 text-red-500">{{ session('error') }}</div>
                    @endif
                    <div class="grid grid-cols-3 gap-4">
                        <div class="col-span-1">
                            <h6 class="text-xl font-semibold">
                                {{ __('Pallet Register Bottling Line Crate') }}
                            </h6>
                            <div class="flex-auto py-10 pt-0">
                                <div class="flex flex-wrap mt-8">
                                    <!-- Start Pallet Number -->
                                    <div class="w-full py-2">
                                        <x-form.input wire:model="start_pallet_number" type="number"
                                                      id="startPalletNumber" label="Start Pallet Number"
                                                      placeholder="Enter Start Pallet Number"
                                                      oninput="this.value = this.value.replace(/e|E|\+|\-/g, '')"
                                                      min="0"/>
                                        <x-form.input-error for="start_pallet_number" class="mt-2"/>
                                    </div>

                                    <!-- End Pallet Number -->
                                    <div class="w-full py-2">
                                        <x-form.input wire:model="end_pallet_number" type="number" id="endPalletNumber"
                                                      label="End Pallet Number" placeholder="Enter End Pallet Number"
                                                      oninput="this.value = this.value.replace(/e|E|\+|\-/g, '')"
                                                      min="0"/>
                                        <x-form.input-error for="end_pallet_number" class="mt-2"/>
                                    </div>

                                    <script>
                                        // Prevent invalid keys during input
                                        document.getElementById('startPalletNumber').addEventListener('keydown', function (e) {
                                            if (['e', 'E', '+', '-'].includes(e.key)) {
                                                e.preventDefault();
                                            }
                                        });

                                        document.getElementById('endPalletNumber').addEventListener('keydown', function (e) {
                                            if (['e', 'E', '+', '-'].includes(e.key)) {
                                                e.preventDefault();
                                            }
                                        });
                                    </script>

                                    <!-- Production Line -->
                                    <div class="w-full py-2">
                                        <x-form.input wire:model="productionLine" type="text" label="Production Line"
                                                      readonly/>

                                        <x-form.input-error for="productionLine" class="mt-2"/>
                                    </div>

                                    <!-- Product Type -->
                                    <div class="w-full py-2">
                                        <x-form.input wire:model="productType" type="text" label="Production Line"
                                                      readonly/>

                                        <x-form.input-error for="productionLine" class="mt-2"/>
                                    </div>
                                    <!-- Package -->
                                    <div class="w-full py-2">
                                        <x-form.input wire:model="package" type="text" label="Package" readonly/>

                                        <x-form.input-error for="package" class="mt-2"/>
                                    </div>

                                    <!-- Volume (Always visible) -->
                                    <div class="w-full py-2">
                                        <x-form.input wire:model="volume" type="text" label="Volume" readonly/>

                                        <x-form.input-error for="volume" class="mt-2"/>
                                    </div>
                                    <!-- Unit -->
                                    <div class="w-full py-2">
                                        <x-form.input wire:model="unit" type="text" label="Unit" readonly/>

                                        <x-form.input-error for="unit" class="mt-2"/>
                                    </div>

                                    <!-- Total Amount per Pallet -->
                                    <div class="w-full py-2">
                                        <x-form.input wire:model="totalAmountPerPallet" type="text"
                                                      label="Total Amount per Pallet"/>

                                        <x-form.input-error for="totalAmountPerPallet" class="mt-2"/>
                                    </div>


                                </div>
                                <!-- Submit Button -->
                                <div class="w-full py-4">
                                    <button wire:click="store"
                                            class="w-full px-4 py-2 text-white bg-blue-500 rounded shadow hover:bg-blue-600">
                                        Register Pallets
                                    </button>
                                </div>
                            </div>

                            {{-- </form> --}}
                        </div>
                        <div class="col-span-2">

                            <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg dark:bg-gray-800 p-4">
                                <!-- Button Group for Select/Remove All & Print -->
                                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                                    <!-- Select / Remove All Buttons -->
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
                                    </div>

                                    <!-- Select Range Inputs -->
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 w-full md:w-auto">
                                        <div>
                                            <label for="start_range" class="block text-sm font-medium text-gray-700">Start
                                                Range</label>
                                            <input wire:model="rangeStart" type="number" min="1" id="start_range"
                                                   class="block w-full p-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                                                   placeholder="Start Range">
                                        </div>

                                        <div>
                                            <label for="end_range" class="block text-sm font-medium text-gray-700">End
                                                Range</label>
                                            <input wire:model="rangeEnd" type="number" min="1" id="end_range"
                                                   class="block w-full p-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                                                   placeholder="End Range">
                                        </div>

                                        <div class="flex items-end">
                                            <button wire:click="selectRangeByDynamic"
                                                    class="px-4 py-2 w-full text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-300">
                                                Select Rows in Range
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>

                                    <th scope="col" class=""></th>
                                    <th scope="col" class=""> ID</th>

                                    <th scope="col" class="">Pallet Number</th>
                                    <th scope="col" class="">Product Type</th>
                                    <th scope="col" class="">Production Line</th>
                                    <th scope="col" class="">Package</th>
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
                                            <input type="checkbox" wire:model="selectedPallets"
                                                   value="{{ $user->id }}"
                                                   class="form-checkbox">
                                        </td>
                                        <td class="px-2 ">{{ $dynamic++ }}</td>

                                        <td class="">PLT - {{ $user->pallet_number }}</td>
                                        <th class=""> {{ $user->product_type }}</th>

                                        <td class="">{{ $user->production_line }}</td>
                                        <td class="">{{ $user->package }}</td>
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
                        <div class="mt-4">

                            {{ $pallets->links() }}
                        </div>
                    </div>
                </div>
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
</script>
