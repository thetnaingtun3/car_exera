@section('student-active', 'bg-gray-100 group')
<div>
    <section class="py-1 bg-blueGray-50">
        <div class="w-full px-6 mx-auto mt-6 ">


            <div
                class="relative flex flex-col w-full min-w-0 mb-6 break-words border-0 rounded-lg shadow-lg bg-blueGray-100">
                <div class="px-6 py-6 mb-0 text-white rounded-t bg-gradient-to-r from-red-800 to-gray-800">
                    <div class="flex justify-between text-center">
                        <h6 class="text-xl font-bold text-blueGray-700">
                            {{ $form->admin ? 'Edit Admin' : 'Create Admin' }}
                        </h6>
                    </div>
                </div>

                <div class="flex-auto px-4 py-10 pt-0 lg:px-10 ">
                    <form wire:submit.prevent="save" enctype="multipart/form-data">
                        <div class="flex flex-wrap mt-8">
                            <div class="w-full px-4 lg:w-6/12">
                                <x-form.input wire:model="form.name" type="text" label="Name"/>
                                <x-form.input-error for="form.name" class="mt-2"/>
                            </div>

                            <div class="w-full px-4 lg:w-6/12">
                                <x-form.input wire:model="form.email" type="email" label="Email"/>
                                <x-form.input-error for="form.email" class="mt-2"/>
                            </div>

                        </div>
                        {{--selecte roles with dorpdown--}}
                        <div class="flex flex-wrap mt-8">
                            <div class="w-full px-4 lg:w-6/12">
                                <x-form.select-box wire:model="form.role" label="Role">
                                    <option value="">Select Role</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </x-form.select-box>
                                <x-form.input-error for="form.role" class="mt-2"/>
                            </div>
                        </div>
                        <div class="flex flex-wrap mt-8">
                            <div class="w-full px-4 lg:w-6/12">
                                <x-form.input wire:model="form.password"
                                              type="text"
                                              {{--                                                                      type="{{ $visible ? 'text' : 'password' }}"--}}
                                              label="Password"
                                              placeholder="{{ $form->admin ? 'Leave blank to keep current password' : '' }}"/>
                                {{--                                                        <button type="button" wire:click.prevent="togglePassword">--}}
                                {{--                                                            <x-phosphor.icons::regular.eye--}}
                                {{--                                                                class="w-6 h-6 mx-3 text-black-800"/>--}}
                                {{--                                                        </button>--}}
                                <x-form.input-error for="form.password" class="mt-2"/>
                            </div>

                        </div>


                        <div class="flex justify-end mt-4 space-x-2">
                            <x-form.button color="quaternary" wire:navigate :href="route('index.admin')">Cancel
                            </x-form.button>
                            <x-form.button color="secondary">{{ $form->admin ? 'Update' : 'Save' }}</x-form.button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
