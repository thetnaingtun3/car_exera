<nav class="w-full py-2 bg-gradient-to-r from-blue-800 to-gray-800">
    <div class="px-4 py-4 lg:px-5 lg:pl-3">
        <div class="container flex items-center justify-between mx-auto">
            <div class="flex items-center justify-start">
                <a href="{{ route('dashboard') }}" class="flex ml-2 md:mr-24">
                </a>
            </div>

            <div class="relative inline-block text-left">
                <button id="dropdownButton" data-dropdown-toggle="dropdown" type="button"
                        class="flex items-center text-white focus:outline-none">
                    <span class="rounded-full avatar avatar-sm">
                        <img src="{{ asset('images/user.gif') }}" alt="User Avatar" class="w-10 h-10 rounded-full">
                    </span>
                    <span class="ml-2 text-sm font-medium">{{ auth()->user()->name }}</span>

                </button>

                <div id="dropdown"
                     class="absolute right-0 z-50 hidden w-48 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <div class="py-1" role="none">
                        @livewire('logout')
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
