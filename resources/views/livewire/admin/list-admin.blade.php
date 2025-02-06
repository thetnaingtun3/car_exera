<div>
    <div class="px-4 py-2 bg-gray-200">
        <span class="text-gray-500 text-md">Home / <span class="text-blue-900 ">Admin</span></span>
    </div>
    <section class="mt-10">
        <div class="max-w-screen-xl px-4 mx-auto lg:px-12">
            <!-- Start coding here -->

            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div class="flex items-center justify-between p-4 ">
                    <x-theme.button wire:navigate :href="route('create.admin')"
                                    :active="request()->routeIs('create.admin')">
                        {{ __('Create') }}
                    </x-theme.button>

                    <div class="flex">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                     fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <input wire:model.live.debounce.300ms="search" type="text"
                                   class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 "
                                   placeholder="Search" required="">
                        </div>
                    </div>
                    <div class="flex space-x-3">
                        <div class="flex items-center space-x-3">
                            <label class="w-40 text-sm font-medium text-gray-900">Status Type :</label>
                            <select wire:model.live="status"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="">All</option>
                                <option value="active">Active</option>
                                <option value="inactive">InActive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>

                            <th scope="col" class="px-4 py-3">Name</th>
                            <th scope="col" class="px-4 py-3">Email</th>
                            <th scope="col" class="px-4 py-3">Created Date</th>
                            <th scope="col" class="px-4 py-3">Last update</th>
{{--                            <th scope="col" class="px-4 py-3">Status</th>--}}
                            <th scope="col" class="px-4 py-3">

                                <span class="">Actions</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($admins as $data)
                            <tr wire:key="{{ $data->id }}" class="border-b dark:border-gray-700">
                                <th scope="row"
                                    class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $data->name }}</th>
                                <td class="px-4 py-3">{{ $data->email }}</td>
                                <td class="px-4 py-3">{{ $data->created_at }}</td>
                                <td class="px-4 py-3">{{ $data->updated_at }}</td>
{{--                                <td class="px-4 py-3">{{ $data->status }}</td>--}}
                                <td class="flex px-4 py-3 ">

                                    {{--                                    <x-form.button color="primary" wire:navigate--}}
                                    {{--                                                   :href="route('batch.edit', $batch->id)">Edit--}}
                                    {{--                                    </x-form.button>--}}

                                    <button
                                        onclick="confirm('Are you sure you want to delete {{ $data->name }} ?') || event.stopImmediatePropagation()"
                                        wire:click="delete({{ $data->id }})"
                                        class="px-3 py-1 text-white bg-red-500 rounded">
                                        <x-phosphor.icons::regular.trash class="w-4 h-4"/>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="px-3 py-4">
                    <div class="flex ">
                        <div class="flex items-center mb-3 space-x-4">
                            <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                            <select wire:model.live='perPage'
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="5">5</option>
                                <option value="7">7</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                    {{ $admins->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
