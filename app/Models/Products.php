<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'productname',
        'category',
        'subcategory',
        'cost',
        'price',
        'attachment_id'
    ];


}
