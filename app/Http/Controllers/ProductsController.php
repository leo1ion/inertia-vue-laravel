<?php

namespace App\Http\Controllers;
use Inertia\Inertia;

use App\Models\Products;
use App\Models\Categories;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function addProduct(){

        return Inertia::render('Main/index');
    }
}
