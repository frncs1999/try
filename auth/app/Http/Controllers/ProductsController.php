<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() 
    {
        $products = Products::get();
        return response()->json($products, 201);
    }

    public function add(Request $request) 
    {
        \Log::info($request);
        $products = new Products();
        $products->productname = $request->productname;
        $products->productdes = $request->productdes;
        $products->save();
        return response()->json($products, 201);
    }

    public function edit($id)
    {
        $products = Products::find($id);
        return view('edit', compact('products'));
    }

    public function update(Request $request, $id) 
    {
        $products = Products::find($id);
        $products->productname = $request->productname;
        $products->productdes = $request->productdes;
        $products->save();
        return response()->json($products, 200);
    }

    public function delete($id) 
    {
        $products = Products::find($id);
        if($products){
            $products->delete();
        }
        return response()->json($products, 201);
    }
}