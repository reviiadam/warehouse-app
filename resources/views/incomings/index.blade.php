<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Barang Masuk') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <a href="{{ route('incomings.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">
                    Tambah Barang Masuk
                </a>

                <table class="mt-4 w-full border">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-3 py-2">Tanggal</th>
                            <th class="border px-3 py-2">Produk</th>
                            <th class="border px-3 py-2">Qty</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($incomings as $item)
                            <tr>
                                <td class="border px-3 py-2">{{ $item->created_at->format('d-m-Y H:i') }}</td>
                                <td class="border px-3 py-2">{{ $item->product->name }}</td>
                                <td class="border px-3 py-2">{{ $item->qty }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-4">
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
