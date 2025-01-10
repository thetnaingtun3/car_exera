<div>
    <div class="px-4 py-2 bg-gray-200">
        <span class="text-gray-500 text-md">Home / <span class="text-blue-900 ">Admin</span></span>
    </div>
    <section class="mt-10">
        <div class="max-w-screen-xl px-4 mx-auto lg:px-12">
            <!-- Start coding here -->

            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div class="flex items-center justify-between p-4 ">

                    @foreach($roles as $role)
                        <div class="card">
                            <div class="card-header">
                                <h3>{{ $role->name }}</h3>
                            </div>
                            <div class="card-body">
                                <p>{{ $role->description }}</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Permissions</h4>
                                        <ul>
                                            @foreach($role->permissions as $permission)
                                                <li>{{ $permission->name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Users</h4>
                                        <ul>
                                            @foreach($role->users as $user)
                                                <li>{{ $user->name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary" wire:click="editRole({{ $role->id }})">Edit</button>
                                <button class="btn btn-danger" wire:click="deleteRole({{ $role->id }})">Delete</button>
                            </div>
                        </div>
                        <br>

                    @endforeach

                </div>
            </div>
        </div>
</div>
