@section('student-active', 'bg-gray-100 group')
<div>
    <section class="py-1 bg-blueGray-50">
        <div class="w-full px-6 mx-auto mt-6 ">


            <div
                class="relative flex flex-col w-full min-w-0 mb-6 break-words border-0 rounded-lg shadow-lg bg-blueGray-100">
                <div class="px-6 py-6 mb-0 text-white rounded-t bg-gradient-to-r from-blue-800 to-gray-800">
                    <div class="flex justify-between text-center">
                        <h6 class="text-xl font-bold text-blueGray-700">
                            {{ $form->truck ? 'Edit Truck' : 'Create Truck' }}
                        </h6>
                    </div>
                </div>
                {{-- licence_plate',
        'vehicle_type',
        'size', --}}

                <div class="flex-auto px-4 py-10 pt-0 lg:px-10 ">
                    <form wire:submit.prevent="save" enctype="multipart/form-data">
                        <div class="flex flex-wrap mt-8">
                            <div class="w-full px-4 lg:w-6/12">

                                <x-form.select-box wire:model="lsp_id" label="Select LSP">
                                    <option selected>Select LSP</option>
                                    @foreach ($lsps as $item)
                                        <option value="{{ $item->id }}">{{ $item->lsp_name }}</option>
                                    @endforeach
                                </x-form.select-box>
                                <x-form.input-error for="lsp_id" class="mt-2" />
                            </div>

                            <div class="w-full px-4 lg:w-6/12">
                                <x-form.input wire:model="form.licence_plate" type="text" maxlength="7"
                                    label="Plate Number " />
                                <x-form.input-error for="form.licence_plate" class="mt-2" />
                            </div>


                            <div class="w-full px-4 pt-5 lg:w-6/12">
                                <x-form.input wire:model="form.driver_name" type="text" label="Driver Name " />
                                <x-form.input-error for="form.driver_name" class="mt-2" />
                            </div>


                            <div class="w-full px-4 pt-5 lg:w-3/12">
                                <x-form.input wire:model="form.size" type="number" label="Size " />
                                <x-form.input-error for="form.size" class="mt-2" />
                            </div>
                            <div class="w-full px-4 pt-5 lg:w-3/12">
                                <x-form.select-box wire:model="form.unit" label="Select Unit">
                                    <option value="" disabled>Select Type</option>
                                    <option value="Wheel" {{ $form->unit === 'Wheel' ? 'selected' : '' }}>Wheel
                                    </option>
                                    <option value="Feet" {{ $form->unit === 'Feet' ? 'selected' : '' }}>Feet
                                    </option>
                                </x-form.select-box>
                            </div>
                            <div class="w-full px-4 mt-4 lg:w-3/12">
                                <label for="status"
                                    class="block mb-2 text-sm font-medium text-gray-700">Status</label>
                                <select wire:model="form.status" id="status" name="status"
                                    class="shadow-sm bg-gray-50 border text-sm rounded-lg w-full p-2.5 focus:ring-black-500 focus:border-black">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                <x-form.input-error for="form.status" class="mt-2" />
                            </div>



                        </div>

                        <div class="flex justify-end mt-4 space-x-2">

                            <x-form.button color="quaternary" wire:navigate :href="route('index.truck')">Cancel
                            </x-form.button>
                            <x-form.button color="secondary">{{ $form->truck ? 'Update' : 'Save' }}</x-form.button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
