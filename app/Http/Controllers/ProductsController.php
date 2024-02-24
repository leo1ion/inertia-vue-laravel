<?php

namespace App\Http\Controllers;
use Inertia\Inertia;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function addProduct(){
        return Inertia::render('Main/index', []);
    }
}
