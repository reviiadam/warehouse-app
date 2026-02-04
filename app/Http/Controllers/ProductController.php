<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /* List produk */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /* Form tambah produk */
    public function create()
    {
        return view('products.create');
    }

    /* Simpan produk baru */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:products,code',
            'name' => 'required',
        ]);

        Product::create([
            'code' => $request->code,
            'name' => $request->name,
            'stock' => 0,
        ]);

        return redirect()->route('products.index');
    }

    /* Form edit produk */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /* Update produk */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'code' => 'required|unique:products,code,' . $product->id,
            'name' => 'required',
        ]);

        $product->update([
            'code' => $request->code,
            'name' => $request->name,
        ]);

        return redirect()->route('products.index');
    }

    /* Hapus produk */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index');
    }

    /* restock product */
    public function reportStock()
    {
        $products = Product::all();
        return view('reports.stock', compact('products'));
    }
}
