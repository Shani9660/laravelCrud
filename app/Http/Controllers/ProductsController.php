<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //     $products = DB::select("
    //     SELECT products.*, categories.name as category_name
    //                categories.name as subcategory_name,
    //     FROM products
    //     JOIN categories ON products.category = categories.id
    //     INNER JOIN categories ON products.category = categories.id

    // ");
    $products = DB::table('products')
    ->select(
        'products.*',
        DB::raw('(SELECT name FROM categories WHERE id = products.category) AS category_name'),
        DB::raw('(SELECT name FROM categories WHERE id = products.subcategory) AS subcategory_name')
    )
    ->get();
    //  echo "<pre>";
    //  print_r($products);
    //  die;
       // $products = Products::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('product.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([

            'productname' => 'required',
            'category' => 'required',
            'subcategory' => 'required',
            'cost' => 'required|',
            'price' => 'required|',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Create the product
        Products::create([
            'productname' => $request->productname,
            'category' => $request->category,
            'subcategory' => $request->subcategory,
            'cost' => $request->cost,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('product.index')->with('success', 'Product created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Products::find($id);
        return view('product.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Products::findOrFail($id);


        $validated = $request->validate([
            'productname' => 'required',
            'category' => 'required',
            'subcategory' => 'required',
            'cost' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);


        if ($request->hasFile('image')) {

            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }


            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }


        $product->update([
            'productname' => $request->productname,
            'category' => $request->category,
            'subcategory' => $request->subcategory,
            'cost' => $request->cost,
            'price' => $request->price,
            'image' => $product->image,
        ]);

        return redirect()->route('product.index')->with('success', 'Product updated successfully!');
    }


    public function destroy(string $id)
    {
        $product = Products::findOrFail($id);

        // Delete the image file if it exists
        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }

        // Delete the product
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully!');

    }

}
