@section('student-active', 'bg-gray-100 group')

<section class="py-1 bg-blueGray-50">
    <div class="w-full px-6 mx-auto mt-6 ">

        <div
            class="relative flex flex-col w-full min-w-0 mb-6 break-words border-0 rounded-lg shadow-lg bg-blueGray-100">
            <div class="px-6 py-6 mb-0 text-white rounded-t bg-gradient-to-r from-blue-800 to-gray-800">
                <div class="flex justify-between text-center">
                    <h6 class="text-xl font-bold">
                        Truck Data Import
                    </h6>
                </div>
            </div>
            <div class="flex-auto px-4 py-10 pt-0 lg:px-10 ">
                <div class="w-full px-4 mt-5">

                    <x-form.button color="secondary" class="" wire:click="user_excel_download">Excel Template
                        Download
                    </x-form.button>
                </div>


                <form wire:submit.prevent="save">
                    <div class="flex flex-wrap mt-8">

                        <div class="w-full px-4 lg:w-6/12">
                            <x-form.select-box wire:model='lsp_id' label="Select LSP">

                                <option hidden>Select LSP</option>
                                @foreach ($lsps as $item)
                                    <option value="{{ $item->id }}">{{ $item->lsp_name }}</option>
                                @endforeach
                            </x-form.select-box>
                            <x-form.input-error for="lsp_id" class="mt-2"/>

                        </div>


                        <div class="w-full px-4 mt-5">
                            <div wire:loading wire:target="file">Uploading...</div>
                            <x-form.input type="file" wire:model="file" label="Excel File"/>

                            <x-form.input-error for="file" class="mt-2"/>

                        </div>
                    </div>

                    <div class="flex justify-center mt-8 space-x-2">
                        <x-form.button color="quaternary" wire:navigate :href="route('index.truck')">Cancel
                        </x-form.button>
                        <x-form.button color="secondary">Import</x-form.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
