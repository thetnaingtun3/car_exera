@section('student-active', 'bg-gray-100 group')
<div>
    <section class="py-1 bg-blueGray-50">
        <div class="w-full px-6 mx-auto mt-6 ">


            <div
                class="relative flex flex-col w-full min-w-0 mb-6 break-words border-0 rounded-lg shadow-lg bg-blueGray-100">
                <div class="px-6 py-6 mb-0 ">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="col-span-1">
                            <h6 class="text-xl font-semibold">
                                {{ __('Car Register') }}
                            </h6>
                            <div class="flex-auto py-10 pt-0 ">
                                <form wire:submit.prevent="save" enctype="multipart/form-data">
                                    <div class="flex flex-wrap mt-8">
                                        <!-- Select LSP -->

                                        <div class="w-full py-2">
                                            <select wire:model.live="lsp_id"
                                                class="w-full px-3 py-3 text-sm transition-all duration-150 ease-linear bg-white border-0 rounded shadow placeholder-blueGray-300 text-blueGray-600 focus:outline-none focus:ring-2 focus:ring-pink-500 ring-inset">
                                                <option value="">Select LSP</option>
                                                @foreach ($this->lsps as $lsp)
                                                    <option value="{{ $lsp->id }}">{{ $lsp->lsp_name }}</option>
                                                @endforeach
                                            </select>
                                            <x-form.input-error for="lsp_id" class="mt-2" />

                                        </div>
                                        <!-- Customer Dropdown -->

                                        <div class="w-full py-2">
                                            <select wire:model.live="customer_id"
                                                class="w-full px-3 py-3 text-sm transition-all duration-150 ease-linear bg-white border-0 rounded shadow placeholder-blueGray-300 text-blueGray-600 focus:outline-none focus:ring-2 focus:ring-pink-500 ring-inset">
                                                <option value="">Select Customer</option>
                                                @foreach ($this->customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->customer_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <x-form.input-error for="customer_id" class="mt-2" />

                                        </div>
                                        <!-- Truck Dropdown -->

                                        <div class="w-full py-2">
                                            <select wire:model.live="car_id"
                                                class="w-full px-3 py-3 text-sm transition-all duration-150 ease-linear bg-white border-0 rounded shadow placeholder-blueGray-300 text-blueGray-600 focus:outline-none focus:ring-2 focus:ring-pink-500 ring-inset">
                                                <option value="">Select Truck</option>
                                                @foreach ($this->trucks as $truck)
                                                    <option value="{{ $truck->id }}">{{ $truck->licence_plate }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- Driver Name -->

                                        <div class="w-full py-2">
                                            <x-form.input wire:model="driver_name" type="text" label="Driver Name" />
                                            <x-form.input-error for="driver_name" class="mt-2" />
                                        </div>

                                        <!-- Product -->
                                        <div class="w-full py-2">
                                            <x-form.select-box wire:model="product" label="Product">
                                                <option value="">Select Product</option>
                                                @foreach (config('custom.products') as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </x-form.select-box>
                                            <x-form.input-error for="product" class="mt-2" />
                                        </div>

                                        <!-- Package -->
                                        <div class="w-full py-2">
                                            <x-form.select-box wire:model="package" label="Package">
                                                <option value="">Select Package</option>
                                                @foreach (config('custom.package') as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </x-form.select-box>
                                            <x-form.input-error for="package" class="mt-2" />
                                        </div>

                                        <!-- Quantity -->
                                        <div class="w-full py-2">
                                            <x-form.input wire:model="qty" type="number" label="Quantity" />
                                            <x-form.input-error for="qty" class="mt-2" />
                                        </div>

                                        <!-- Unit -->
                                        <div class="w-full py-2">
                                            <x-form.select-box wire:model="unit" label="Unit">
                                                <option value="">Select Unit</option>
                                                @foreach (config('custom.unit') as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </x-form.select-box>
                                            <x-form.input-error for="unit" class="mt-2" />
                                        </div>

                                        <!-- Add Button -->
                                        <div class="w-full py-2">
                                            <button type="button" wire:click="add"
                                                class="px-4 py-2 text-white bg-blue-500 rounded">Add Product</button>
                                        </div>

                                        <!-- Display Added Products -->
                                        <div class="w-full mt-4 bg-gray-300">
                                            @foreach ($products as $index => $product)
                                                <div class="flex items-center py-2 border-b">
                                                    <p class="w-1/4">{{ $product['product'] }}</p>
                                                    <p class="w-1/4">{{ $product['package'] }}</p>
                                                    <p class="w-1/4">{{ $product['qty'] }}</p>
                                                    <p class="w-1/4">{{ $product['unit'] }}</p>
                                                    <button type="button"
                                                        wire:click="removeProduct({{ $index }})"
                                                        class="px-3 py-1 ml-4 text-xs text-white bg-red-500 rounded hover:bg-red-600">
                                                        Delete
                                                    </button>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Order Number -->

                                        <div class="w-full py-2">
                                            <x-form.input wire:model="order_number" type="text"
                                                label="Order Number" />
                                            <x-form.input-error for="order_number" class="mt-2" />
                                        </div>

                                        <!-- Remark -->
                                        <div class="w-full py-2">
                                            <label for="remark"
                                                class="block text-sm font-medium text-gray-700">Remark</label>
                                            <textarea id="remark" wire:model="remark" rows="4"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                                placeholder="Enter your remark here"></textarea>
                                            <x-form.input-error for="remark" class="mt-2" />
                                        </div>

                                    </div>

                                    <!-- Buttons -->
                                    <div class="flex justify-end mt-4 space-x-2">
                                        {{-- <x-form.button color="quaternary" wire:navigate :href="route('index.customer')">Cancel
                                        </x-form.button> --}}
                                        <x-form.button color="secondary">{{ 'Submit' }}</x-form.button>
                                    </div>
                                </form>
                            </div>

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
                                            <th scope="col" class="">Car Number</th>
                                            <th scope="col" class="">Driver Name</th>
                                            <th scope="col" class="">Customer Name</th>
                                            <th scope="col" class="">Type of Truck</th>
                                            <th scope="col" class="">Register Date</th>
                                            <th scope="col" class="">Time</th>

                                            <th scope="col" class="px-4 py-3 text-center">
                                                <span class="">Actions</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($registrations as $key => $user)
                                            <tr wire:key="{{ $user->id }}" class="border-b">

                                                <td class="">{{ ++$key }}</td>

                                                <td class="">{{ $user->truck->licence_plate }}</td>
                                                <th class=""> {{ $user->driver_name }}</th>
                                                <td class="">{{ $user->customer->customer_name }}</td>

                                                <td class="">{{ $user->truck->size }}</td>
                                                <td class="">{{ $user->created_at->format('d-m-Y') }}</td>
                                                <td class="">{{ $user->created_at->format('h:i:s A') }}</td>
                                                <td class="flex items-center justify-center my-2">
                                                    <a class="hover:cursor-pointer"
                                                        href="{{ route('qrcode.show', $user->id) }}" target="_blank"
                                                        title="Generate QR Code">
                                                        <x-phosphor.icons::fill.qr-code
                                                            class="w-6 h-6 mx-3 {{ $user->status == 1 ? 'text-red-400' : 'text-blue-400' }}" />
                                                    </a>
                                                    {{-- detials --}}
                                                    <a class="hover:cursor-pointer"
                                                        href="{{ route('reg.car.detials', $user->id) }}"
                                                        title="View Details">
                                                        <x-phosphor.icons::fill.eye
                                                            class="w-6 h-6 mx-3 text-blue-400" />
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
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
