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

                                        <div class="w-full py-2">
                                            <select wire:model.live="driver_id"
                                                class="w-full px-3 py-3 text-sm transition-all duration-150 ease-linear bg-white border-0 rounded shadow placeholder-blueGray-300 text-blueGray-600 focus:outline-none focus:ring-2 focus:ring-pink-500 ring-inset">
                                                <option value="">Select Driver Name</option>
                                                @foreach ($this->truckDrivers as $truck)
                                                    <option value="{{ $truck->id }}">{{ $truck->driver_name }}
                                                    </option>
                                                @endforeach
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        @if ($isOtherDriver)
                                            <div class="w-full py-2">
                                                <x-form.input wire:model.live="driver_name" type="text"
                                                    label="Enter Driver Name" />
                                            </div>
                                        @endif


                                        <!-- Product -->
                                        <div class="w-full py-2">
                                            <x-form.select-box wire:model.live="product" label="Product">
                                                <option value="">Select Product</option>
                                                @foreach (config('custom.products') as $key => $product)
                                                    <option value="{{ $product }}">{{ $product }}</option>
                                                @endforeach
                                            </x-form.select-box>
                                            <x-form.input-error for="product" class="mt-2" />
                                        </div>
                                        <!-- Package -->
                                        <div class="w-full py-2">
                                            <x-form.select-box wire:model.live="package" label="Package">
                                                <option value="">Select Package</option>
                                                @foreach ($this->availablePackages as $key => $package)
                                                    <option value="{{ $key }}">{{ $package }}</option>
                                                @endforeach
                                            </x-form.select-box>
                                            <x-form.input-error for="package" class="mt-2" />
                                        </div>

                                        <!-- Quantity -->
                                        <div class="w-full  py-2">
                                            <x-form.input wire:model.live="qty" type="number" label="Quantity" />
                                            <x-form.input-error for="qty" class="mt-2" />
                                        </div>

                                        <!-- Unit -->
                                        <div class="w-full py-2">
                                            <x-form.select-box wire:model.live="unit" label="Unit">
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
                                                class="px-4 py-2 text-white bg-blue-500 rounded">Add Product
                                            </button>
                                        </div>
                                        <!-- Display Added Products -->
                                        <div class="w-full mt-4 bg-gray-300  rounded-md">
                                            @foreach ($products as $index => $product)
                                                <div class="flex items-center px-4 py-3 border-b bg-gray-300">
                                                    <!-- Product name -->
                                                    <p class="flex-1 text-sm font-medium">{{ $product['product'] }}</p>

                                                    <!-- Package details -->
                                                    <p class="flex-1 text-sm">{{ $product['package'] }}</p>

                                                    <!-- Quantity -->
                                                    <p class="text-sm text-center">{{ $product['qty'] }}</p>

                                                    <!-- Unit -->
                                                    <p class="w-16 text-sm text-center">{{ $product['unit'] }}</p>

                                                    <!-- Delete button aligned to the right -->
                                                    <div class="ml-auto">
                                                        <button type="button"
                                                            wire:click="removeProduct({{ $index }})"
                                                            class="px-3 py-1 text-xs text-white bg-red-500 rounded hover:bg-red-600">
                                                            Delete
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>


                                        <!-- Temporary Order Number Input -->
                                        <div class="w-full mt-4 py-2">
                                            <x-form.input wire:model="temporaryOrderNumber" type="number"
                                                label="Enter Order Number"
                                                placeholder="Enter a 10-digit order number" />
                                            <x-form.input-error for="temporaryOrderNumber" class="mt-2" />
                                        </div>

                                        <!-- Add Order Number Button -->
                                        <div class="w-full py-2">
                                            <button type="button" wire:click="addOrderNumber"
                                                class="px-4 py-2 text-white bg-blue-500 rounded"
                                                @if (count($orderNumbers) >= 10) disabled @endif>
                                                Add Order Number
                                            </button>
                                        </div>

                                        <!-- Display Error Message if max limit is reached -->
                                        @if (count($orderNumbers) >= 10)
                                            <p class="text-red-500 text-sm">You have reached the maximum limit of 10
                                                order numbers.</p>
                                        @endif

                                        <!-- Display Added Order Numbers -->
                                        @if (!empty($orderNumbers))
                                            <div class="w-full mt-4 bg-gray-300 rounded-md">
                                                @foreach ($orderNumbers as $index => $orderNumber)
                                                    <div class="flex items-center px-4 py-2 border-b">
                                                        <!-- Order Number -->
                                                        <p class="flex-1 text-sm">{{ $orderNumber }}</p>

                                                        <!-- Delete Button -->
                                                        <button type="button"
                                                            wire:click="removeOrderNumber({{ $index }})"
                                                            class="px-2 py-1 text-xs text-white bg-red-500 rounded hover:bg-red-600">
                                                            Remove
                                                        </button>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif


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

                                                <td class="">

                                                    @if ($user->driver_id == null)
                                                        {{ $user->driver_name }}
                                                    @else
                                                        {{ $user->truck->driver_name }}
                                                    @endif
                                                </td>

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
