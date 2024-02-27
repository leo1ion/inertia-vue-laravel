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

    public $timestamps = false;
    public function assignProduct($productId){
        return CategorySelection::create([
            'product_id'=> $productId,
            'category_id' => $this->id,
        ]);
    }
    // public function getProducts()
    // {
    //     return $this->hasManyThrough(Products::class, CategorySelection::class, 'category_id', 'id');
    // }
}
