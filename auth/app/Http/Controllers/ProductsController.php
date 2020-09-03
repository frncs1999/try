<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() {
        $products = Products::get();
        return view('index')->with(compact('products'));
    }

    public function add(Request $request) {
        \Log::info($request);
        $products = new Products();
        $products->productname = $request->productName;
        $products->productdes = $request->productDes;
        $products->save();
        return redirect()->back();
    }

    public function edit($id)
    {
        $products = Products::find($id);
        return view('edit', compact('products'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'productName' => 'required',
            'productDes' => 'required'
          ]);
          $products = Products::find($id);
          $products->productname = $request->get('productName');
          $products->productdes = $request->get('productDes');
          $products->save();
          return redirect()->route('products.index');
    }

    public function delete($id) {
        $products = Products::find($id);
        if($products){
            $products->delete();
        }
        return redirect()->back();
    }
}