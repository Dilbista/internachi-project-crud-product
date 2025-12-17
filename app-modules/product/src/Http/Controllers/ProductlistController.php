<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Modules\Product\Models\Productlist;

class ProductlistController
{
    //
 


    public function index()
    {
        //this is for local scope
        // $products = Productlist::active()->latest()->get();

        //this is for global scope
        $products = Productlist::all();
        $allProducts = Productlist::withoutGlobalScope('active')->get();


        return view('product::index', compact('products'));
    }




    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'description'    => 'nullable|string',
            'purchase' => 'required|numeric|min:0',
            'selling'  => 'required|numeric|min:0',
            'quantity'       => 'required|integer|min:0',
            'status'         => 'required|in:active,inactive',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->extension();
            $request->file('image')->storeAs('products', $imageName, 'public');
        }

        $product = new Productlist();
        $product->name           = $validated['name'];
        $product->description    = $validated['description'] ?? null;
        $product->purchase_price = $validated['purchase'];
        $product->selling_price  = $validated['selling'];
        $product->quantity       = $validated['quantity'];
        $product->status         = $validated['status'];
        $product->image          = $imageName;
        $product->save();


               return redirect()
            ->route('product.index')
            ->with('success', 'Product add successfully');
    }

    public function edit($id)
    {
        $products = Productlist::findOrFail($id);
        return view('product::edit', compact('products'));
    }


    public function update(Request $request, $id)
    {
        $products = Productlist::findOrFail($id);

        // 1️⃣ Validate input
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'description'    => 'nullable|string',
            'purchase_price' => 'required|numeric|min:0',
            'selling_price'  => 'required|numeric|min:0',
            'quantity'       => 'required|integer|min:0',
            'status'         => 'required|in:active,inactive',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // 2️⃣ Handle image replacement
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($products->image && Storage::disk('public')->exists('products/' . $products->image)) {
                Storage::disk('public')->delete('products/' . $products->image);
            }

            // Store new image
            $imageName = time() . '.' . $request->file('image')->extension();
            $request->file('image')->storeAs('products', $imageName, 'public');
            $products->image = $imageName;
        }


        $products->name           = $validated['name'];
        $products->description    = $validated['description'] ?? null;
        $products->purchase_price = $validated['purchase_price'];
        $products->selling_price  = $validated['selling_price'];
        $products->quantity       = $validated['quantity'];
        $products->status         = $validated['status'];

        $products->save();

        return redirect()
            ->route('product.index')
            ->with('success', 'Product updated successfully');
    }





    public function create()
    {
        return view('product::create');
    }


      public function show($id)
    {
              $products = Productlist::latest()->get();

        return view('product::index', compact('products'));
    }

     public function destroy($id) {

        $product = Productlist::findOrFail($id);
        $product->delete();

        return redirect()
            ->route('product.index')
            ->with('success', 'Product deleted successfully!');
    }
}
