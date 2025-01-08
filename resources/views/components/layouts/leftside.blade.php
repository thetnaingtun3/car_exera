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
        <h1
            class="mx-20 mt-10 cursor-pointer w-30 h-30"
        >Logo</h1>
        {{--        <img src="{{ asset('images/logosfg.png') }}" class="mx-20 mt-10 cursor-pointer w-30 h-30"--}}
        {{--            alt="Strategy First Global Logo">--}}

        <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                <ul class="pb-2 my-2 space-y-2">
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
                        <a href="{{ route('create.admin') }}" wire:navigate
                           class="flex items-center p-2 text-base text-gray-900 rounded-lg dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">
                            <x-phosphor.icons::regular.user-circle class="w-6 h-6 mx-3 text-blue-800"/>
                            <span class="ml-3" sidebar-toggle-item>Admin </span>
                        </a>
                    </li>

                    {{--
                    <li>
                        <a href="{{ route('teacher.index') }}" wire:navigate
                            class="flex items-center p-2 text-base text-gray-900 rounded-lg dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">
                            <x-phosphor.icons::regular.user-circle class="w-6 h-6 mx-3 text-red-800" />
                            <span class="ml-3" sidebar-toggle-item>Teacher</span>
                        </a>
                    </li> --}}

                    admin-role-create

                    {{-- <button type="button"
                        class="flex @yield('student-active') items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700"
                        aria-controls="dropdown-student" data-collapse-toggle="dropdown-student">
                        <x-phosphor.icons::regular.text-columns class="w-6 h-6 mx-3 text-red-700" />
                        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Student</span>
                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button> --}}

                <!-- Dropdown Menu -->
                    {{-- <ul id="dropdown-student"
                        class="{{ request()->routeIs('student.index') || request()->routeIs('student.import') || request()->routeIs('user.feedback.list') ? '' : 'hidden' }} py-2 space-y-2">
                        <li>
                            <a href="{{ route('student.index') }}" wire:navigate
                                class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg pl-11 dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">Student
                                List</a>
                        </li>
                        <li>
                            <a href="{{ route('student.import') }}" wire:navigate
                                class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg pl-11 dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">Student
                                Import</a>
                        </li>
                        <li>
                            <a href="{{ route('user.feedback.list') }}" wire:navigate
                                class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg pl-11 dark:text-gray-200 hover:bg-gray-100 group dark:hover:bg-gray-700">
                                Student Feedbacks
                            </a>
                        </li>
                    </ul> --}}
                </ul>

            </div>
        </div>
    </div>
</aside>
