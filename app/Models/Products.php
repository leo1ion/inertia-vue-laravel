<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'id', 'name','price','quantity','description',
    ];

    protected $hidden = [
        'id',
    ];

    public $timestamps = false;

    public function getCategories()
    {
        // get all categories related to the product
        return $this->hasManyThrough(Categories::class, CategorySelection::class, 'product_id', 'id','id','category_id');
    }
}
