<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Get_Products()
    {
        return view(
            "products.index",
            ['products' => Product::orderBy('name','asc')->get()]

        );
    }
    public function Create_Product()
    {
        return view("products.create");
    }
    public function store(Request $request)
    {
        // dd($request->product_image);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'product_image' => 'required|mimes:jpeg,jpg,png,gif|max:1000'
        ]);

        $image_name = time() . '.' . $request->product_image->extension();
        $request->product_image->move(public_path("products"), $image_name);

        $products_add = new Product();

        $products_add->image = $image_name;
        $products_add->name = $request->name;
        $products_add->description = $request->description;

        $products_add->save();

        return back()->withSuccess("Product added sucessfully !!!!!!!!");
    }
    public function product_edit($id)
    {
        $product = Product::findOrFail($id);
        return view("products.edit", compact('product'));
    }
}
