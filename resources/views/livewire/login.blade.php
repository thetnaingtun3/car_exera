<div class="w-full max-w-xl p-6 space-y-8 sm:p-8 dark:bg-gray-800">
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
        Sign in to platform
    </h2>

    <form wire:submit="login" action="#" method="POST" class="mt-8 space-y-6">
        <!-- Display error message if session has 'error' -->
        @if (session()->has('error'))
            <div class="text-red-800 bg-red-100 p-2 rounded">
                {{ session('error') }}
            </div>
        @endif

        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Name</label>
            <div class="@error('name') border border-danger rounded-3 @enderror">
                <input type="text"
                       id="name"
                       wire:model.live="name"
                       class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                       placeholder="Your Name" required>
            </div>
            @error('name')
            <div class="text-red-800">{{ $message }}</div>
            @enderror
        </div>
        
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Password</label>
            <div class="@error('password') border border-danger rounded-3 @enderror">
                <input type="password" id="password" placeholder="••••••••"
                       wire:model.live="password"
                       class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                       required>
            </div>
            @error('password')
            <div class="text-red-800">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit"
                class="w-full px-5 py-3 text-base font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
            Login
        </button>
    </form>
</div>
