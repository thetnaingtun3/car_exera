<section class="py-1 bg-blueGray-50">
    <div class="w-full px-6 mx-auto mt-6 ">

        <div
            class="relative flex flex-col w-full min-w-0 mb-6 break-words border-0 rounded-lg shadow-lg bg-blueGray-100">
            <div class="px-6 py-6 mb-0 text-white rounded-t bg-gradient-to-r from-blue-800 to-gray-800">
                <div class="flex justify-between text-center">
                    <h6 class="text-xl font-bold">
                        Create
                        {{--                        {{ $form->form ? 'Edit Category' : 'Create Category' }}--}}
                    </h6>
                </div>
            </div>
            <div class="flex-auto px-4 py-10 pt-0 lg:px-10 ">
                <form wire:submit.prevent="save">
                    <div class="flex flex-wrap mt-8">

                        <div class="w-full px-4">
                            <x-form.input wire:model="form.name" type="text" label="Role Nmae"/>
                            <x-form.input-error for="form.name" class="mt-2"/>
                        </div>

                    </div>

                    <div class="flex justify-end mt-8 space-x-2">
                        <x-form.button color="quaternary" wire:navigate
                                       :href="route('admin-role-create')">Cancel
                        </x-form.button>
                        <x-form.button>{{ $form->role ? 'Update' : 'Save' }}</x-form.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
