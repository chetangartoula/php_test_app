<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function Get_Products(Request $request)
    {
        $search = $request->search ?? "";

        $query = DB::table('products');

        if ($search !== "") {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        $products = $query->orderBy('name', 'asc')->simplePaginate(4, ['*'], 'page');

        return view("products.index", compact('products'));
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

        return redirect(route("products.index"))->withSuccess("Product added sucessfully !!!!!!!!");
    }
    public function product_edit($id)
    {
        $product = Product::findOrFail($id);
        return view("products.edit", compact('product'));
    }

    public function ProductUpdate(Request $request, $id)

    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'product_image' => 'nullable|mimes:jpeg,jpg,png,gif|max:1000'
        ]);
        $products_add = Product::findOrFail($id);


        if (isset($request->product_image)) {
            $image_name = time() . '.' . $request->product_image->extension();
            $request->product_image->move(public_path("products"), $image_name);
            $products_add->image = $image_name;
        }

        $products_add->name = $request->name;
        $products_add->description = $request->description;

        $products_add->save();
        return redirect(route("products.index"))->withSuccess("Product Updated sucessfully !!!!!!!!");
    }
    public function Productdelete(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect(route("products.index"))->withSuccess("Product delete sucessfully !!!!!!!!");
    }
}
