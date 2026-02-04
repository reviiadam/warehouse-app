<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Welcome Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">
                    Selamat datang, {{ Auth::user()->name }}!
                </h3>
                <p class="text-gray-600 dark:text-gray-300">
                    Anda berhasil login ke sistem Warehouse Inventory Management.
                </p>
            </div>

        </div>
    </div>
</x-app-layout>
