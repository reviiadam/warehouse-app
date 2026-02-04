<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Incoming;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class IncomingController extends Controller
{
    public function index()
    {
        $incomings = Incoming::with('product')->latest()->get();
        return view('incomings.index', compact('incomings'));
    }

    public function create()
    {
        $products = Product::all();
        return view('incomings.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($request) {
            Incoming::create($request->only('product_id', 'qty'));

            Product::find($request->product_id)
                ->increment('stock', $request->qty);
        });

        return redirect()->route('incomings.index')
            ->with('success', 'Barang masuk berhasil');
    }

    public function report()
    {
        $incomings = Incoming::with('product')->latest()->get();
        return view('reports.incoming', compact('incomings'));
    }
}
