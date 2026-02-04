<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Master Produk') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <a href="{{ route('products.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">
                    Tambah Produk
                </a>

                <table class="mt-4 w-full border">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-3 py-2">Kode</th>
                            <th class="border px-3 py-2">Nama</th>
                            <th class="border px-3 py-2">Stok</th>
                            <th class="border px-3 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td class="border px-3 py-2">{{ $product->code }}</td>
                                <td class="border px-3 py-2">{{ $product->name }}</td>
                                <td class="border px-3 py-2">{{ $product->stock }}</td>
                                <td class="border px-3 py-2 space-x-2 flex flex-row gap-2 justify-center">
                                    <a href="{{ route('products.edit', $product->id) }}" class="text-blue-600">Edit</a>

                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600" onclick="return confirm('Yakin hapus?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4">
                                    Data produk belum ada
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
