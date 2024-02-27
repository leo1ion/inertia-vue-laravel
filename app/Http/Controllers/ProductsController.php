<?php

namespace App\Http\Controllers;
use Inertia\Inertia;

use App\Models\Products;
use App\Models\Categories;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function addProduct(){
        // main page
        try{
            return Inertia::render('Main/index');
        }catch(\Exception $e){
            Log::channel('daily')->error($e);
            return false;
        }
    }
    public function saveProduct(Request $request){
        // saves the product and returns a confirmation page
        try{
            $product = Products::create([
                'name'=> $request->name,
                'price'=> $request->price,
                'quantity' => $request->quantity,
                'description' => $request->description,
            ]);

            // loop through each category selected and assign the product to it
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
