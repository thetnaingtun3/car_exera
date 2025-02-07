@section('lsp-active', 'bg-gray-100 group')
<div>
    <div class="px-4 py-2 bg-gray-200">
        <span class="text-gray-500 text-md">Home / <span class="text-blue-900">LSP</span></span>
    </div>

    <section class="mt-10">
        <div class="w-full px-6 mx-auto mt-6">
            <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg dark:bg-gray-800 p-4">

                <!-- Total Count -->
                <div class="flex gap-10 items-start justify-start">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4">Total Count {{ $count }}</h2>

                    <a href="{{ route('create.lsp') }}"
                       class="px-4 py-2 text-white bg-indigo-500 rounded-lg hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300">
                        Create
                    </a>

                    <a href="{{ route('import.lsp') }}"
                       class="px-4 py-2 text-white bg-emerald-500 rounded-lg hover:bg-emerald-600 focus:ring-4 focus:ring-emerald-300">
                        Import
                    </a>

                    <button wire:click="exportData"
                            class="px-4 py-2 text-white bg-teal-500 rounded-lg hover:bg-teal-600 focus:ring-4 focus:ring-teal-300">
                        Export Data
                    </button>
                </div>

                <div class="relative w-80 mt-5">
                    <input wire:model.live.debounce.300ms="search" type="text"
                           class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Search">
                </div>

            </div>

        </div>


        <!-- LSP Table -->
        <div class="overflow-x-auto px-5   mt-4">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                <tr>
                    <th class="px-4 py-3 text-start">ID</th>
                    <th class="px-4 py-3 text-start">LSP Name</th>
                    <th class="px-4 py-3 text-start">Status</th>
                    <th class="px-4 py-3 text-start">Creation Date</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($lsps as $key => $lsp)
                    <tr wire:key="{{ $lsp->id }}" class="border-b">
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $lsp->id }}</td>
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $lsp->lsp_name }}</td>
                        @if ($lsp->status == 'active')
                            <td class="px-4 py-3 font-medium text-green-500">{{ $lsp->status }}</td>
                        @else
                            <td class="px-4 py-3 font-medium text-red-500">{{ $lsp->status }}</td>
                        @endif


                        <td class="px-4 py-3">{{ $lsp->created_at->format('d-m-Y ') }}</td>
                        {{--                        <td class="px-4 py-3">{{ $lsp->created_at->format('d-m-Y h:i:s A') }}</td>--}}
                        <td class="flex   items-center justify-center my-2">
                            @if (!$lsp->customers()->exists() && !$lsp->trucks()->exists())
                                <x-form.button class="bg-red-700 hover:bg-red-800"
                                               wire:confirm="Are you sure you want to delete {{ $lsp->lsp_name }}?"
                                               wire:click="deleteLSP({{ $lsp->id }})">
                                    <x-phosphor.icons::regular.trash class="w-6 h-6 mx-1 text-white"/>
                                </x-form.button>
                            @endif
                            <x-form.button wire:navigate secondary :href="route('edit.lsp', $lsp->id)">
                                <x-phosphor.icons::regular.pen class="w-6 h-6 mr-1 text-white"/>
                            </x-form.button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-3 py-4">
            {{ $lsps->links() }}
        </div>
    </section>
</div>
