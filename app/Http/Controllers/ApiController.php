<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categories;
use Log;

class ApiController extends Controller
{
    public function fetchCategories(){
        try{
            $categories = Categories::get();

            return json_encode($categories);
        }catch(\Exception $e){
            Log::channel('daily')->error($e);
            return false;
        }
    }
}
