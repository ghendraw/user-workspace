<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'purchase_price',
        'selling_price',
        'date',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
