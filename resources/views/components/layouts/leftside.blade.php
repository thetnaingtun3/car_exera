{{-- @php --}}
{{--    $currentRoute = Route::current()->getName(); --}}
{{--    $attrributes = ['chapter.index', 'teacher.index', 'subject.index', 'dashboard']; --}}
{{--    $attrributeActive = ''; --}}
{{--    if (in_array($currentRoute, $attrributes)) { --}}
{{--        $attrributeActive = 'underline'; --}}
{{--    } --}}
{{-- @endphp --}}
<aside id="sidebar"
    class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0 hidden w-64 h-full font-normal duration-75 lg:flex transition-width"
    aria-label="Sidebar">
    <div
        class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <h1 class="mx-20 mt-10 cursor-pointer w-30 h-30">Logo</h1>
        {{--        <img src="{{ asset('images/logosfg.png') }}" class="mx-20 mt-10 cursor-pointer w-30 h-30" --}}
        {{--            alt="Strategy First Global Logo"> --}}

        {{--        <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto"> --}}
        {{--            <div class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700"> --}}
        {{--                <ul class="pb-2 my-2 space-y-2"> --}}
        {{--                    <li> --}}
        {{--                        <a href="{{ route('dashboard') }}" wire:navigate --}}
        {{--                           class="flex active items-center --}}
        {{--                                @yield('dashboard-active') --}}
        {{--                               p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 "> --}}
        {{--                            <x-phosphor.icons::regular.gauge class="w-6 h-6 mx-3 text-blue-800"/> --}}
        {{--                            <span class="ml-3" sidebar-toggle-item>Dashboard</span> --}}
        {{--                        </a> --}}
        {{--                    </li> --}}
        {{--                    <li> --}}
        {{--                        <a href="{{ route('index.admin') }}" wire:navigate --}}
        {{--                           class="flex items-center p-2 text-base text-gray-900 rounded-lg dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700"> --}}
        {{--                            <x-phosphor.icons::regular.user-circle class="w-6 h-6 mx-3 text-blue-800"/> --}}
        {{--                            <span class="ml-3" sidebar-toggle-item>Admin </span> --}}
        {{--                        </a> --}}
        {{--                    </li> --}}
        {{--                </ul> --}}
        {{--            </div> --}}
        {{--        </div> --}}

        <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                <ul class="pb-2 my-2 space-y-2">

                    {{-- Dashboard (Visible to all roles) --}}
                    <li>
                        <a href="{{ route('dashboard') }}" wire:navigate
                            class="flex active items-center
                        @yield('dashboard-active')
                               p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 ">
                            <x-phosphor.icons::regular.gauge class="w-6 h-6 mx-3 text-blue-800" />
                            <span class="ml-3" sidebar-toggle-item>Dashboard</span>
                        </a>
                    </li>


                    {{-- Admin Section (Only for admin or root-admin) --}}
                    @hasanyrole('admin|root-admin')
                        <li>
                            <a href="{{ route('index.lsp') }}" wire:navigate
                                class="flex items-center p-2 text-base text-gray-900 rounded-lg dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">
                                <x-phosphor.icons::regular.user-circle class="w-6 h-6 mx-3 text-blue-800" />
                                <span class="ml-3" sidebar-toggle-item>LSP</span>
                            </a>
                        </li>
                    @endhasanyrole
                    @hasanyrole('admin|root-admin')
                        <li>
                            <a href="{{ route('index.customer') }}" wire:navigate
                                class="flex items-center p-2 text-base text-gray-900 rounded-lg dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">
                                <x-phosphor.icons::regular.user-circle class="w-6 h-6 mx-3 text-blue-800" />
                                <span class="ml-3" sidebar-toggle-item>Customer</span>
                            </a>
                        </li>
                    @endhasanyrole
                    @hasanyrole('admin|root-admin')
                        <li>
                            <a href="{{ route('index.truck') }}" wire:navigate
                                class="flex items-center p-2 text-base text-gray-900 rounded-lg dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">
                                <x-phosphor.icons::regular.user-circle class="w-6 h-6 mx-3 text-blue-800" />
                                <span class="ml-3" sidebar-toggle-item>Truck</span>
                            </a>
                        </li>
                    @endhasanyrole

                    @hasanyrole('admin|root-admin')
                        <li>
                            <a href="{{ route('index.admin') }}" wire:navigate
                                class="flex items-center p-2 text-base text-gray-900 rounded-lg dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">
                                <x-phosphor.icons::regular.user-circle class="w-6 h-6 mx-3 text-blue-800" />
                                <span class="ml-3" sidebar-toggle-item>Admin</span>
                            </a>
                        </li>
                    @endhasanyrole

                    {{-- Transoper Section --}}
                    @hasanyrole('transoper|root-admin')
                        <li>
                            <a href="{{ route('index.transoper') }}" wire:navigate
                                class="flex items-center p-2 text-base text-gray-900 rounded-lg dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">
                                <x-phosphor.icons::regular.clipboard class="w-6 h-6 mx-3 text-blue-800" />
                                <span class="ml-3" sidebar-toggle-item>Transoper</span>
                            </a>
                        </li>
                    @endhasanyrole

                    {{-- Loading Section --}}
                    @hasanyrole('loading|root-admin')
                        <li>
                            <a href="{{ route('index.loading') }}" wire:navigate
                                class="flex items-center p-2 text-base text-gray-900 rounded-lg dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">
                                <x-phosphor.icons::regular.truck class="w-6 h-6 mx-3 text-blue-800" />
                                <span class="ml-3" sidebar-toggle-item>Loading</span>
                            </a>
                        </li>
                    @endhasanyrole

                    {{-- Production Section --}}
                    @hasanyrole('production|root-admin')
                        <li>
                            <a href="{{ route('index.production') }}" wire:navigate
                                class="flex items-center p-2 text-base text-gray-900 rounded-lg dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">
                                <x-phosphor.icons::regular.factory class="w-6 h-6 mx-3 text-blue-800" />
                                <span class="ml-3" sidebar-toggle-item>Production</span>
                            </a>
                        </li>
                    @endhasanyrole

                </ul>
            </div>
        </div>
    </div>
</aside>
