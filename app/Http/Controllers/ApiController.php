<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categories;

class ApiController extends Controller
{
    public function fetchCategories(){

        $categories = Categories::get();

        return json_encode($categories);
    }
}
