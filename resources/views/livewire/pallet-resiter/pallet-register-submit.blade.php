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
                                {{ __('Pallet Register') }}
                            </h6>
                            <div class="flex-auto py-10 pt-0">
                                <div class="flex flex-wrap mt-8">
                                    <!-- Start Pallet Number -->
                                {{--                                    <div class="w-full py-2">--}}
                                {{--                                        <x-form.input wire:model="start_pallet_number" type="number"--}}
                                {{--                                                      label="Start Pallet Number"--}}
                                {{--                                                      placeholder="Enter Start Pallet Number"/>--}}
                                {{--                                        <x-form.input-error for="start_pallet_number" class="mt-2"/>--}}
                                {{--                                    </div>--}}

                                {{--                                    <!-- End Pallet Number -->--}}
                                {{--                                    <div class="w-full py-2">--}}
                                {{--                                        <x-form.input wire:model="end_pallet_number" type="number"--}}
                                {{--                                                      label="End Pallet Number" placeholder="Enter End Pallet Number"/>--}}
                                {{--                                        <x-form.input-error for="end_pallet_number" class="mt-2"/>--}}
                                {{--                                    </div>--}}


                                <!-- Start Pallet Number -->
                                    <div class="w-full py-2">
                                        <x-form.input wire:model="start_pallet_number" type="number"
                                                      id="startPalletNumber"
                                                      label="Start Pallet Number"
                                                      placeholder="Enter Start Pallet Number"
                                                      oninput="this.value = this.value.replace(/e|E|\+|\-/g, '')"
                                                      min="0"/>
                                        <x-form.input-error for="start_pallet_number" class="mt-2"/>
                                    </div>

                                    <!-- End Pallet Number -->
                                    <div class="w-full py-2">
                                        <x-form.input wire:model="end_pallet_number" type="number"
                                                      id="endPalletNumber"
                                                      label="End Pallet Number"
                                                      placeholder="Enter End Pallet Number"
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
                                    <!-- Product Type -->
                                    <div class="w-full py-2">
                                        <select wire:model.live="productType"
                                                class="w-full px-3 py-3 text-sm bg-white border-0 rounded shadow">
                                            <option value="">Select Product Type</option>
                                            @foreach ($data as $type => $lines)
                                                <option value="{{ $type }}">{{ $type }}</option>
                                            @endforeach
                                        </select>
                                        <x-form.input-error for="productType" class="mt-2"/>
                                    </div>

                                    <!-- Production Line -->
                                    @if (!empty($availableProductionLines))
                                        <div class="w-full py-2">
                                            <select wire:model.live="productionLine"
                                                    class="w-full px-3 py-3 text-sm bg-white border-0 rounded shadow">
                                                <option value="">Select Production Line</option>
                                                @foreach ($availableProductionLines as $line)
                                                    <option value="{{ $line }}">{{ $line }}</option>
                                                @endforeach
                                            </select>
                                            <x-form.input-error for="productionLine" class="mt-2"/>
                                        </div>
                                @endif

                                <!-- Package -->
                                    <div class="w-full py-2">
                                        <x-form.input wire:model="package" type="text" label="Package" readonly/>
                                    </div>

                                    <!-- Volume -->
                                    <div class="w-full py-2">
                                        <x-form.input wire:model="volume" type="text" label="Volume" readonly/>
                                    </div>

                                    <!-- Unit -->
                                    <div class="w-full py-2">
                                        <x-form.input wire:model="unit" type="text" label="Unit" readonly/>
                                    </div>

                                    <!-- Total Amount per Pallet -->
                                    <div class="w-full py-2">
                                        <x-form.input wire:model="totalAmountPerPallet" type="text"
                                                      label="Total Amount per Pallet" readonly/>
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
                            <div class="overflow-x-auto ">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class=""> ID</th>
                                        {{-- @include('livewire.includes.table-sortable-th', [
                                                'name' => 'lsp_name',
                                                'displayName' => 'Car Number',
                                            ]) --}}

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

                                            <td class="">{{ ++$key }}</td>

                                            <td class="">{{ $user->pallet_number }}</td>
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
                                                   href="{{ route('palletqrcode.show', $user->id) }}" target="_blank"
                                                   title="Generate QR Code">
                                                    <x-phosphor.icons::fill.qr-code
                                                        class="w-6 h-6 mx-3 {{ $user->status == 1 ? 'text-red-400' : 'text-blue-400' }}"/>
                                                </a>
                                                {{-- <a class=" hover:cursor-pointer" <a
                                                        href="{{ route('qrcode.show', $user->id) }}" target="_blank"
                                                        title="Generate QRcode">

                                                        <x-phosphor.icons::fill.qr-code
                                                            class="w-6 h-6 mx-3 text-blue-400" />
                                                    </a> --}}
                                                {{-- <button wire:click="generateQrCode({{ $user->id }})"
                                                        class="px-4 py-2 text-white bg-blue-500 rounded">
                                                        <x-phosphor.icons::fill.qr-code
                                                            class="w-6 h-6 mx-3 text-blue-400" />

                                                    </button> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{-- <div class="mt-4">

                                {{ $pallets->links() }}
                            </div> --}}
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </section>
</div>
