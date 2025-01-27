@section('student-active', 'bg-gray-100 group')
<div>
    <div class="px-4 py-2 bg-gray-200">
        <span class="text-gray-500 text-md">Home / <span class="text-blue-900">Customer</span></span>
    </div>
    <section class="mt-10">

        <div class="w-full px-6 mx-auto mt-6 ">
            <!-- Start coding here -->

            <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg dark:bg-gray-800">
                <div class="flex items-center justify-between p-4 d">
                    <x-theme.button wire:navigate :href="route('import.customer')" :active="request()->routeIs('import.customer')">
                        {{ __('Customer Import') }}
                    </x-theme.button>
                    <x-theme.button wire:navigate :href="route('create.customer')" :active="request()->routeIs('create.customer')">
                        {{ __('Create New Customer') }}
                    </x-theme.button>
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
                    <div class="relative">
                        <button wire:click="exportData"
                            class="px-4 py-2 mt-6 ml-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-300 dark:bg-green-500 dark:hover:bg-green-600">
                            Export Data
                        </button>
                    </div>


                </div>
                <div class="overflow-x-auto ">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                {{-- @include('livewire.includes.table-sortable-th', [
                                    'name' => 'lsp_name',
                                    'displayName' => 'LSP Name',
                                ]) --}}
                                <th scope="col" class="px-4 py-3">LSP Name</th>
                                <th scope="col" class="px-4 py-3"> Customer Name</th>
                                <th scope="col" class="px-4 py-3"> Customer Code</th>

                                <th scope="col" class="px-4 py-3 text-center">
                                    <span class="">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $user)
                                <tr wire:key="{{ $user->id }}" class="border-b">
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $user->lsp->lsp_name }}</th>

                                    <td class="px-4 py-3">{{ $user->customer_name }}</td>
                                    <td class="px-4 py-3">{{ $user->customer_code }}</td>
                                    <td class="flex items-center justify-center my-2">
                                        <a wire:navigate href="{{ route('edit.customer', $user->id) }}"
                                            title="Edit Student">

                                            <x-phosphor.icons::fill.pencil-line class="w-6 h-6 mx-3 text-blue-400" />
                                        </a>
                                        {{-- <a wire:click='deleteStudent({{ $user }})' class="cursor-pointer"
                                            title="Delete Student"
                                            wire:confirm="Are you sure you want to delete {{ $user->name }}?">

                                            <x-phosphor.icons::fill.trash class="w-6 h-6 mx-3 text-red-800" />
                                        </a> --}}

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="px-3 py-4">
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
