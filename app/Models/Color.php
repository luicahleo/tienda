<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // n:n colors y Product
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    // n:n colors y size
    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }
}
