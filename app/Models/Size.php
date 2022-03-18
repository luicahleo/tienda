<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'product_id'];

    //1:n inversa size Product
    public function Product()
    {
        return $this->belongsTo(Product::class);
    }

    //n:n size colors
    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }
}
