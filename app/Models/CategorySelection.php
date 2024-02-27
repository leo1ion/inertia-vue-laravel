<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorySelection extends Model
{
    protected $table = 'category_selection';

    protected $fillable = [
        'id', 'product_id','category_id',
    ];

    protected $hidden = [
        'id',
    ];

    public $timestamps = false;
}
