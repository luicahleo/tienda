<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'image', 'icon'];

    //metodo para generar relaciones entre categories y subcategories
    //1 categories puede tener n subcategories  Relacion  1:n
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    //relacion n:n entre categories y brands
    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }

    //esta relacion es entre categories y products, para eso usamos el 'atraves de' por eso usamos hasManyThrough()
    public function products()
    {
        return $this->hasManyThrough(Product::class, Subcategory::class);
    }
}
