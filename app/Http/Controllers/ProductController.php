<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produc = Product::all();
        return view('product.index')->with('products', $produc);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = Storage::disk('public')->put('image', $request->image);
        $preparData = [
            'image' => $file,
            'name' => $request->name,
            'amount' => $request->amount,
            'price' => $request->price,
            'desc' => $request->desc

        ];
        Product::create($preparData);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        return view('product.edit')->with('product', $product);
    }


    public function update(Request $request, Product $product)
    {
        $preparData = [
            'name' => $request->name,
            'price' => $request->price,
            'amount' => $request->amount,
            'desc' => $request->desc,
        ];

        if ($request->image) {
            $file = Storage::disk('public')->put('image', $request->image);
            $preparData['image'] = $file;
        }

        $query = Product::find($product->id);

        if ($product->image && $request->image) {
            unlink('storage/' . $query->image);
        }
        $query->update($preparData);
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $query = Product::find($product->id);
        unlink('storage/' . $query->image);
        $query->delete();
        return redirect()->route('product.index');
    }
}
