<?php

namespace App\Http\Controllers;
use Inertia\Inertia;

use App\Models\Products;
use App\Models\Categories;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function addProduct(){
        try{
            return Inertia::render('Main/index');
        }catch(\Exception $e){
            Log::channel('daily')->error($e);
            return false;
        }
    }
    public function saveProduct(Request $request){
        try{
            $product = Products::create([
                'name'=> $request->name,
                'price'=> $request->price,
                'quantity' => $request->quantity,
                'description' => $request->description,
            ]);
            foreach($request->selectedCategories as $category){
                Categories::where('name',$category)->first()->assignProduct($product->id);
            }
            return Inertia::render('Main/productCreated');
        }catch(\Exception $e){
            Log::channel('daily')->error($e);
            return false;
        }
    }
}
