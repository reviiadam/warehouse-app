<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Outgoing;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OutgoingController extends Controller
{
    public function index()
    {
        $outgoings = Outgoing::with('product')->latest()->get();
        return view('outgoings.index', compact('outgoings'));
    }

    public function create()
    {
        $products = Product::where('stock', '>', 0)->get();
        return view('outgoings.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty' => [
                'required',
                'integer',
                'min:1',
                function ($attribute, $value, $fail) use ($request) {
                    $product = Product::find($request->product_id);
                    if ($product && $value > $product->stock) {
                        $fail('Stok tidak mencukupi! Saat ini stok: ' . $product->stock);
                    }
                }
            ],
        ]);

        DB::transaction(function () use ($request) {
            $product = Product::findOrFail($request->product_id);

            Outgoing::create($request->only('product_id', 'qty'));

            $product->decrement('stock', $request->qty);
        });

        return redirect()->route('outgoings.index')
            ->with('success', 'Barang keluar berhasil disimpan');
    }

    public function report()
    {
        $outgoings = Outgoing::with('product')->latest()->get();
        return view('reports.outgoing', compact('outgoings'));
    }
}
