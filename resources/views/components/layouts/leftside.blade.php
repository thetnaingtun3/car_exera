@php
    $currentRoute = Route::current()->getName();

    $attrributes = [
        'dashboard',
        'index.admin',
        'index.loading',
        'index.transoper',
        'index.production',
        'create.admin',
        'admin-role-list',
        'admin-role-create',
        'index.customer',
        'create.customer',
        'edit.customer',
        'import.customer',
        'import.truck',
        'index.truck',
        'create.truck',
        'edit.truck',
        'index.lsp',
        'create.lsp',
        'edit.lsp',
        'reg.car',
        'order.history',
        'order.qrcode.history',
        'qrcode.show',
        'pallet.register',
        'palletqrcode.show',
        'pallet.history',
        'pallet.qrcode.history',
    ];
    $attrributeActive = '';
    if (in_array($currentRoute, $attrributes)) {
        $attrributeActive = 'underline';
    }
@endphp
<aside id="sidebar"
       class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0 hidden w-64 h-full font-normal duration-75 lg:flex transition-width"
       aria-label="Sidebar">
    <div
        class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <h1 class="mx-20 mt-10 cursor-pointer w-30 h-30">Logo</h1>

        <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                <ul class="pb-2 my-2 space-y-2">

                    {{-- Dashboard (Visible to all roles) --}}
                    <li>
                        <a href="{{ route('dashboard') }}" wire:navigate
                           class="flex active items-center
                        @yield('dashboard-active')
                               p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 ">
                            <x-phosphor.icons::regular.gauge class="w-6 h-6 mx-3 text-blue-800"/>
                            <span class="ml-3" sidebar-toggle-item>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pallet.canning-line-one') }}" wire:navigate
                           class="flex active items-center
                        @yield('dashboard-active')
                               p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 ">
                            <x-phosphor.icons::regular.gauge class="w-6 h-6 mx-3 text-blue-800"/>
                            <span class="ml-3" sidebar-toggle-item>Canning Line 1</span>
                        </a>

                    </li>
                    <li>
                        <a href="{{ route('pallet.canning-line-two') }}" wire:navigate
                           class="flex active items-center
                        @yield('dashboard-active')
                               p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 ">
                            <x-phosphor.icons::regular.gauge class="w-6 h-6 mx-3 text-blue-800"/>
                            <span class="ml-3" sidebar-toggle-item>Canning Line 2</span>
                        </a>

                    </li>

                    <li>
                        <a href="{{ route('pallet.kegline.one') }}" wire:navigate
                           class="flex active items-center
                        @yield('dashboard-active')
                               p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 ">
                            <x-phosphor.icons::regular.gauge class="w-6 h-6 mx-3 text-blue-800"/>
                            <span class="ml-3" sidebar-toggle-item>Keg Line 1</span>
                        </a>

                    </li>
                    <li>
                        <a href="{{ route('pallet.kegline.two') }}" wire:navigate
                           class="flex active items-center
                        @yield('dashboard-active')
                               p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 ">
                            <x-phosphor.icons::regular.gauge class="w-6 h-6 mx-3 text-blue-800"/>
                            <span class="ml-3" sidebar-toggle-item> Keg Line 2 </span>
                        </a>

                    </li>
                    <li>

                        <a href="{{ route('pallet.bottlingline.carton') }}" wire:navigate
                           class="flex active items-center
                        @yield('dashboard-active')
                               p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 ">
                            <x-phosphor.icons::regular.gauge class="w-6 h-6 mx-3 text-blue-800"/>
                            <span class="ml-3" sidebar-toggle-item>BottlingLineCarton</span>
                        </a>

                    </li>

                    @hasanyrole('root-admin')
                    <li>
                        <a href="{{ route('index.admin') }}" wire:navigate
                           class="flex items-center p-2 text-base text-gray-900 rounded-lg dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">
                            <x-phosphor.icons::regular.user-circle-gear class="w-6 h-6 mx-3 text-blue-800"/>
                            <span class="ml-3" sidebar-toggle-item>Admin</span>
                        </a>
                    </li>
                    @endhasanyrole

                    @hasanyrole('registration|root-admin')
                    <button type="button"
                            class="flex @yield('car-active') items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700"
                            aria-controls="dropdown-car" data-collapse-toggle="dropdown-car">


                        <x-phosphor.icons::regular.note class="w-6 h-6 mx-3 text-blue-800"/>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>CarRegistration
                            </span>
                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->

                    <ul id="dropdown-car" class="py-2 space-y-2 ">

                        <li>
                            <a href="{{ route('reg.car') }}" wire:navigate
                               class="flex items-center p-2 text-base text-gray-900 rounded-lg dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">
                                <x-phosphor.icons::regular.note class="w-6 h-6 mx-3 text-blue-800"/>
                                <span class="ml-3" sidebar-toggle-item>

                                        Car Registration
                                    </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('order.history') }}" wire:navigate
                               class="flex items-center p-2 text-base text-gray-900 rounded-lg dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">
                                <x-phosphor.icons::regular.pen class="w-6 h-6 mx-3 text-blue-800"/>
                                <span class="ml-3" sidebar-toggle-item>

                                        Car Registration History
                                    </span>
                            </a>
                        </li>
                        {{--
                <li>
                    <a href="{{ route('order.qrcode.history') }}" wire:navigate
                        class="flex items-center p-2 text-base text-gray-900 rounded-lg dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">
                        <x-phosphor.icons::regular.pen class="w-6 h-6 mx-3 text-blue-800" />
                        <span class="ml-3" sidebar-toggle-item>

                            Car Registration Qr Code History
                        </span>
                    </a>
                </li> --}}
                    </ul>
                    @endhasanyrole

                    {{-- Admin Section (Only for admin or root-admin) --}}

                    {{--                    @hasanyrole('admin|root-admin|registration') --}}
                    @hasanyrole('admin|root-admin')
                    <li>
                        <a href="{{ route('index.lsp') }}" wire:navigate
                           class="flex items-center p-2 text-base text-gray-900 rounded-lg dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">
                            <x-phosphor.icons::regular.user-circle class="w-6 h-6 mx-3 text-blue-800"/>
                            <span class="ml-3" sidebar-toggle-item>LSP</span>
                        </a>
                    </li>
                    @endhasanyrole

                    {{--                    @hasanyrole('admin|root-admin|registration') --}}
                    @hasanyrole('admin|root-admin')
                    <li>
                        <a href="{{ route('index.customer') }}" wire:navigate
                           class="flex items-center p-2 text-base text-gray-900 rounded-lg dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">
                            <x-phosphor.icons::regular.users-four class="w-6 h-6 mx-3 text-blue-800"/>
                            <span class="ml-3" sidebar-toggle-item>Customer</span>
                        </a>
                    </li>
                    @endhasanyrole

                    {{--                    @hasanyrole('admin|root-admin|registration') --}}
                    @hasanyrole('admin|root-admin')
                    <li>
                        <a href="{{ route('index.truck') }}" wire:navigate
                           class="flex items-center p-2 text-base text-gray-900 rounded-lg dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">
                            <x-phosphor.icons::regular.truck-trailer class="w-6 h-6 mx-3 text-blue-800"/>
                            <span class="ml-3" sidebar-toggle-item>Truck</span>
                        </a>
                    </li>
                    @endhasanyrole

                    {{-- Transoper Section --}}


                    {{-- Production Section --}}

                    @hasanyrole('production|root-admin')
                    <button type="button"
                            class="flex @yield('pallet-active') items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700"
                            aria-controls="dropdown-student" data-collapse-toggle="dropdown-student">


                        <x-phosphor.icons::regular.factory class="w-6 h-6 mx-2 text-blue-800"/>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Production Area
                            </span>
                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <ul id="dropdown-student" class="py-2 space-y-2 ">


                        <li>
                            <a href="{{ route('pallet.register') }}" wire:navigate
                               class="flex items-center p-2 text-base text-gray-900 rounded-lg dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">
                                <x-phosphor.icons::regular.factory class="w-6 h-6 mx-3 text-blue-800"/>
                                <span class="ml-3" sidebar-toggle-item>Production</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pallet.history') }}" wire:navigate
                               class="flex items-center p-2 text-base text-gray-900 rounded-lg dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">
                                <x-phosphor.icons::regular.factory class="w-6 h-6 mx-2 text-blue-800"/>
                                <span class="ml-3" sidebar-toggle-item>Pallet History</span>
                            </a>
                        </li>


                        <li>
                            <a href="{{ route('chang.canning.line.one') }}" wire:navigate
                               class="flex items-center p-2 text-base text-gray-900 rounded-lg dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">
                                <x-phosphor.icons::regular.factory class="w-6 h-6 mx-2 text-blue-800"/>
                                <span class="ml-3" sidebar-toggle-item>Chang Canning Line 1</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('chang.canning.line.two') }}" wire:navigate
                               class="flex items-center p-2 text-base text-gray-900 rounded-lg dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">
                                <x-phosphor.icons::regular.factory class="w-6 h-6 mx-2 text-blue-800"/>
                                <span class="ml-3" sidebar-toggle-item>Chang Canning Line 2</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('chang.bottling.line.carton') }}" wire:navigate
                               class="flex items-center p-2 text-base text-gray-900 rounded-lg dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">
                                <x-phosphor.icons::regular.factory class="w-6 h-6 mx-2 text-blue-800"/>
                                <span class="ml-3" sidebar-toggle-item>Chang Bottling Line Carton</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('chang.bottling.line.create') }}" wire:navigate
                               class="flex items-center p-2 text-base text-gray-900 rounded-lg dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">
                                <x-phosphor.icons::regular.factory class="w-6 h-6 mx-2 text-blue-800"/>
                                <span class="ml-3" sidebar-toggle-item>Chang Bottling Line Crate</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('chang.keg.line.one') }}" wire:navigate
                               class="flex items-center p-2 text-base text-gray-900 rounded-lg dark
                                    :text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">
                                <x-phosphor.icons::regular.factory class="w-6 h-6 mx-2 text-blue-800"/>
                                <span class="ml-3" sidebar-toggle-item>Chang Keg Line 1</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('chang.keg.line.two') }}" wire:navigate
                               class="flex items-center p-2 text-base text-gray-900 rounded-lg dark
                                    :text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">
                                <x-phosphor.icons::regular.factory class="w-6 h-6 mx-2 text-blue-800"/>
                                <span class="ml-3" sidebar-toggle-item>Chang Keg Line 2</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('tapper.canning.line.one') }}" wire:navigate
                               class="flex items-center p-2 text-base text-gray-900 rounded-lg dark
                                    :text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">
                                <x-phosphor.icons::regular.factory class="w-6 h-6 mx-2 text-blue-800"/>
                                <span class="ml-3" sidebar-toggle-item>Tapper Canning Line 1</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('tapper.canning.line.two') }}" wire:navigate
                               class="flex items-center p-2 text-base text-gray-900 rounded-lg dark
                                    :text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">
                                <x-phosphor.icons::regular.factory class="w-6 h-6 mx-2 text-blue-800"/>
                                <span class="ml-3" sidebar-toggle-item>Tapper Canning Line 2</span>
                            </a>
                        </li>

                    </ul>
                    @endhasanyrole


                    {{-- Loading Section --}}
                    @hasanyrole('loading|root-admin')
                    <li>
                        <a href="{{ route('loading.data') }}" wire:navigate
                           class="flex items-center p-2 text-base text-gray-900 rounded-lg dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">
                            <x-phosphor.icons::regular.truck class="w-6 h-6 mx-3 text-blue-800"/>
                            <span class="ml-3" sidebar-toggle-item>Loading</span>
                        </a>
                    </li>
                    @endhasanyrole

                </ul>
            </div>
        </div>
    </div>
</aside>
