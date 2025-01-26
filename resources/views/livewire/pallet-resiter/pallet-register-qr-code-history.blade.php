@section('pallet-active', 'bg-gray-100 group')
<div>
    <div class="px-4 py-2 bg-gray-200">
        <span class="text-gray-500 text-md">Home / <span class="text-blue-900"> Pallet Register QR Code
                History</span></span>
    </div>
    <section class="mt-10">

        <div class="w-full px-6 mx-auto mt-6 ">
            <!-- Start coding here -->

            <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg dark:bg-gray-800">
                <div class="flex items-center justify-between p-4 d">
                    {{-- date picker with filter start date and end date --}}
                    <form wire:submit.prevent="applyDateFilter" class="flex space-x-80">
                        <div class="relative">
                            <label for="start_date"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start
                                Date</label>
                            <input wire:model="startDate" type="date" id="start_date"
                                class="block w-full p-2 mt-1 text-sm border rounded-lg bg-gray-50 dark:bg-gray-800 focus:ring-primary-500 focus:border-primary-500">
                        </div>
                        <div class="relative">
                            <label for="end_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">End
                                Date</label>
                            <input wire:model="endDate" type="date" id="end_date"
                                class="block w-full p-2 mt-1 text-sm border rounded-lg bg-gray-50 dark:bg-gray-800 focus:ring-primary-500 focus:border-primary-500">
                        </div>
                        <div class="relative">
                            <button type="submit"
                                class="px-4 py-2 mt-6 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600">
                                Filter
                            </button>
                        </div>
                    </form>
                    <div class="flex">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input wire:model.live.debounce.300ms="search" type="text"
                                class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500"
                                placeholder="Search" required="">
                        </div>
                    </div>

                </div>
                <div class="overflow-x-auto ">

                    <h1> Totla Count {{ $count }}
                    </h1>
                    <table class="w-full mt-5 text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-2"> ID</th>
                                {{-- @include('livewire.includes.table-sortable-th', [
                                            'name' => 'lsp_name',
                                            'displayName' => 'Car Number',
                                        ]) --}}

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

                                    <td class="px-2 ">{{ ++$key }}</td>

                                    <td class="">{{ $user->pallet_number }}</td>
                                    <th class=""> {{ $user->product_type }}</th>

                                    <td class="">{{ $user->production_line }}</td>
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
                                                class="w-6 h-6 mx-3 {{ $user->status == 1 ? 'text-red-400' : 'text-blue-400' }}" />
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

                <div class="px-3 py-4">
                    {{ $pallets->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
