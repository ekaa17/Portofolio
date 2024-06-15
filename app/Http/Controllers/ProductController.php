<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        // dd($products);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        Product::create([
            'nama_product' => $request->nama_product,
            'harga_product' => $request->harga_product,
            'jenis_product' => $request->jenis_product,
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
        ]);
        return redirect('/products');
        // dd($request);
    }
    public function edit($id)
    {
        $product = Product::find($id);

        return view('products.edit', compact('product'));
    }
    public function update(Request $request)
    {
        Product::find($request->id)->update([
            'nama_product' => $request->nama_product,
            'harga_product' => $request->harga_product,
            'jenis_product' => $request->jenis_product,
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
        ]);
        $product = Product::findOrFail($request->id);

        // Simpan gambar ke storage jika ada gambar baru diunggah
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/products', $imageName);
            // Hapus gambar lama jika ada
            if ($product->gambar) {
                Storage::delete('public/products/' . $product->gambar);
            }
        }

        // Update data produk berdasarkan ID
        $product->update([
            'nama_product' => $request->nama_product,
            'harga_product' => $request->harga_product,
            'jenis_product' => $request->jenis_product,
            'gambar' => $imageName ?? $product->gambar, // Gunakan gambar baru atau gambar lama jika tidak ada gambar baru
        ]);
        return redirect('/products');
    }
    public function destroy($id)
    {
        $product = Product::destroy($id);
        return redirect('/products');
    }
}
