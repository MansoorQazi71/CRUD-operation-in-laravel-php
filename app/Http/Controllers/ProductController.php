<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('product.index', ['products' => $products]);
    }
    public function create()
    {
        return view('product.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,gif,jpeg|max:10000'
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'), $imageName);

        $product = new product;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('product created ! ! !');
    }
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();

        return view('product.edit', ['product' => $product]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $product= Product::where('id',$id)->first();
        if (isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;

        }
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('product updated ! ! !');
    }
    public function delete($id)
    {
        $product= Product::where('id',$id)->first();
        $product->delete();
        return back()->withSuccess('product deleted ! ! !');
    }
    public function show($id){
        $product=Product::where('id',$id)->first();
        return view('product.show',['product'=> $product]); 
    }
}
