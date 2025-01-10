@section('dashboard-active', 'bg-gray-100 group')

<div>
    <div class="px-4 py-2 bg-gray-200">
        <span class="text-gray-500 text-md">Home / <span class="text-blue-900 ">Dashboard</span></span>

    </div>


    <section class="mt-10">
        <div class="max-w-screen-xl px-4 mx-auto lg:px-12">


            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">

                {{-- Root Admin can see all sections --}}
                @hasrole('root-admin')
                <div class="p-4">
                    <h3 class="text-lg font-semibold">I am a Root Admin</h3>
                    <p>You can see all roles' information.</p>
                </div>
                @endhasrole

                {{-- For all other roles --}}
                @hasanyrole('admin|transoper|loading|production')
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('root-admin'))
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">I am an Admin</h3>
                    </div>
                @endif

                @if(auth()->user()->hasRole('transoper') || auth()->user()->hasRole('root-admin'))
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">I am a Transoper</h3>
                    </div>
                @endif

                @if(auth()->user()->hasRole('loading') || auth()->user()->hasRole('root-admin'))
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">I am in Loading</h3>
                    </div>
                @endif

                @if(auth()->user()->hasRole('production') || auth()->user()->hasRole('root-admin'))
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">I am in Production</h3>
                    </div>
                @endif
                @endhasanyrole

            </div>
        </div>

    </section>
</div>
