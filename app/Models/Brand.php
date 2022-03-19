<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    //n:n entre brands y categories
    public function categories()
    {
        return $this->BelongsToMany(Category::class);
    }

    //1:n entre brands y products
    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
