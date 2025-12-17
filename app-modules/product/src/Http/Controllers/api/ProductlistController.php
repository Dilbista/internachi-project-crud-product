<?php

namespace Modules\Product\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Modules\Product\Models\Productlist;

class ProductlistController
{
    public function index()
    {
        $products = Productlist::latest()->get();

        // Add full image URL
        $products->transform(function ($product) {
            $product->image = $product->image ? url('storage/products/' . $product->image) : null;
            return $product;

        });

        return response()->json([
            'status' => 'success',
            'data' => $products
        ]);
    }

    // GET /api/products/{id}
    public function show($id)
    {
        $product = Productlist::findOrFail($id);
        $product->image = $product->image ? url('storage/products/' . $product->image) : null;

        return response()->json([
            'status' => 'success',
            'data' => $product
        ]);
    }


    public function store(Request $request)
    {
        dd(123);

        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'description'    => 'nullable|string',
            'purchase_price' => 'required|numeric|min:0',
            'selling_price'  => 'required|numeric|min:0',
            'quantity'       => 'required|integer|min:0',
            'status'         => 'required|in:active,inactive',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = time() . '.' . $request->file('image')->extension();
            $request->file('image')->storeAs('products', $validated['image'], 'public');
        }

        $product = Productlist::create($validated);
        $product->image = $product->image ? url('storage/products/' . $product->image) : null;

        return response()->json([
            'status' => 'success',
            'message' => 'Product created successfully',
            'data' => $product
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Productlist::findOrFail($id);

        $validated = $request->validate([
            'name'           => 'sometimes|required|string|max:255',
            'description'    => 'nullable|string',
            'purchase_price' => 'sometimes|required|numeric|min:0',
            'selling_price'  => 'sometimes|required|numeric|min:0',
            'quantity'       => 'sometimes|required|integer|min:0',
            'status'         => 'sometimes|required|in:active,inactive',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image && Storage::disk('public')->exists('products/' . $product->image)) {
                Storage::disk('public')->delete('products/' . $product->image);
            }
            $validated['image'] = time() . '.' . $request->file('image')->extension();
            $request->file('image')->storeAs('products', $validated['image'], 'public');
        }

        $product->update($validated);
        $product->image = $product->image ? url('storage/products/' . $product->image) : null;

        return response()->json([
            'status' => 'success',
            'message' => 'Product updated successfully',
            'data' => $product
        ]);
    }


    public function destroy($id)
    {
        $product = Productlist::findOrFail($id);

        if ($product->image && Storage::disk('public')->exists('products/' . $product->image)) {
            Storage::disk('public')->delete('products/' . $product->image);
        }

        $product->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Product deleted successfully'
        ]);
    }
}
