<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Produk') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">

                <form method="POST" action="{{ route('products.store') }}" class="space-y-4">
                    @csrf

                    <!-- Kode Produk -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Kode Produk
                        </label>
                        <input type="text" name="code" value="{{ old('code') }}" required
                            class="mt-1 block w-full border rounded px-3 py-2">
                        @error('code')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nama Produk -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Nama Produk
                        </label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                            class="mt-1 block w-full border rounded px-3 py-2">
                        @error('name')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Action -->
                    <div class="flex gap-2 mt-4">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                            Simpan
                        </button>

                        <a href="{{ route('products.index') }}" class="px-4 py-2 bg-gray-300 rounded">
                            Kembali
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
