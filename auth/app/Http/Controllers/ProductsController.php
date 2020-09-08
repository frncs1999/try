<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
class ProductsController extends Controller
{
    public function index(){

        $product = Products::orderBy('id', 'DESC')->get();
            return response()->json($product, 200);
    }

    public function addItem(Request $request){
        
      
        $validator = Validator::make($request->all(), [
            'productname' => 'required|unique:products',
            'productdes' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'status_code'=> JsonResponse::HTTP_NOT_ACCEPTABLE,
                    'error'=> $validator->errors()
                ],
                JsonResponse::HTTP_NOT_ACCEPTABLE);
        }

        // // return 'dont proceed';

        $validated = $validator->validated();

        if($validated){

        $product = new Products();

        $product->productname = $validated['productname'];
        $product->productdes = $validated['productdes'];
        
        $product->save();

        return response()->json(
            [
                'status_code'=> JsonResponse::HTTP_OK,
                'message'=> 'Product is added!!'
            ],
            JsonResponse::HTTP_OK);
        }


       
    }
    public function show($id){
    
        if($product = Products::find($id)){
            return $product;
        }
        else{
            return \response()->json(
                [
                    'status_code'=> JsonResponse::HTTP_NOT_FOUND,
                    'message'=> 'Product not found'

                ],
                JsonResponse::HTTP_NOT_FOUND,

            );
        }
    }
    public function edit($id)
    {
        $product = Products::find($id);
        return response()->json($product, 201);       
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Products::find($id);
        $product->productname = $request->productname;
        $product->productdes = $request->productdes;

        $product->save();
        return $product;
    
    }

      
    public function deleteProduct($id){
 
            Products::where('id',$id)->delete();
            return response()->json(
                [
                    'status_code'=> JsonResponse::HTTP_OK,
                    'message'=> 'Product is Deleted!'
                ],
                JsonResponse::HTTP_OK);

            

    }
}