<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            {{ __('Barang Masuk') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  shadow-sm rounded-lg p-6">

                <form method="POST" action="{{ route('incomings.store') }}" class="space-y-4">
                    @csrf

                    <!-- Produk -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 ">
                            Produk
                        </label>
                        <select name="product_id" required
                            class="mt-1 block w-full border rounded px-3 py-2
                                   bg-white
                                   text-gray-800 ">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">
                                    {{ $product->name }} (stok: {{ $product->stock }})
                                </option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Qty -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 ">
                            Jumlah Masuk
                        </label>
                        <input type="number" name="qty" min="1" required
                            class="mt-1 block w-full border rounded px-3 py-2
                                   bg-white
                                   text-gray-800 ">
                        @error('qty')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Action -->
                    <div class="flex gap-2 mt-4">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                            Simpan
                        </button>

                        <a href="{{ route('incomings.index') }}" class="px-4 py-2 bg-gray-300 rounded">
                            Kembali
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
