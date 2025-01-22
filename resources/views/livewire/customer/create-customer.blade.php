@section('student-active', 'bg-gray-100 group')
<div>
    <section class="py-1 bg-blueGray-50">
        <div class="w-full px-6 mx-auto mt-6 ">


            <div
                class="relative flex flex-col w-full min-w-0 mb-6 break-words border-0 rounded-lg shadow-lg bg-blueGray-100">
                <div class="px-6 py-6 mb-0 text-white rounded-t bg-gradient-to-r from-blue-800 to-gray-800">
                    <div class="flex justify-between text-center">
                        <h6 class="text-xl font-bold text-blueGray-700">
                            {{ $form->customer ? 'Edit Customer' : 'Create Customer' }}
                        </h6>
                    </div>
                </div>

                <div class="flex-auto px-4 py-10 pt-0 lg:px-10 ">
                    <form wire:submit.prevent="save" enctype="multipart/form-data">
                        <div class="flex flex-wrap mt-8">
                            <div class="w-full px-4 lg:w-6/12">
                                <x-form.select-box wire:model="lsp_id" label="Select LSP">
                                    <option hidden>Select LSP</option>
                                    @foreach ($lsps as $item)
                                        <option value="{{ $item->id }}">{{ $item->lsp_name }}</option>
                                    @endforeach
                                </x-form.select-box>
                                <x-form.input-error for="lsp_id" class="mt-2" />
                            </div>

                            <div class="w-full px-4 lg:w-6/12">
                                <x-form.input wire:model="form.customer_code" type="text" label="Customer Code" />
                                <x-form.input-error for="form.customer_code" class="mt-2" />
                            </div>


                            <div class="w-full px-4 pt-5 lg:w-6/12">
                                <x-form.input wire:model="form.customer_name" type="text" label="Customer Name" />
                                <x-form.input-error for="form.customer_name" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex justify-end mt-4 space-x-2">

                            <x-form.button color="quaternary" wire:navigate :href="route('index.customer')">Cancel
                            </x-form.button>
                            <x-form.button color="secondary">{{ $form->customer ? 'Update' : 'Save' }}</x-form.button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
