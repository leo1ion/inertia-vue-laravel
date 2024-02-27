<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\CategorySelection;
use App\Models\Products;

class Categories extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'id', 'name',
    ];

    protected $hidden = [
        'id',
    ];

    public $rules = [
        'name' => 'required|string|max:255',
    ];

    public $timestamps = false;
    public function assignProduct($productId){
        // this function can be called to a category to addign products to it
        return CategorySelection::create([
            'product_id'=> $productId,
            'category_id' => $this->id,
        ]);
    }
    public function getProducts()
    {
        // get all products related to the category
        return $this->hasManyThrough(Products::class, CategorySelection::class, 'category_id', 'id','id','product_id');
    }
}
