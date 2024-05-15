<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id';
    protected $table = 'tbl_product';
    protected $fillable = ['category_id', 'product_name', 'product_desc', 'product_price', 'product_status, product_image'];
}
