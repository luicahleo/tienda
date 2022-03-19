<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const PUBLICADO =2;

    //hay dos maneras de la usar la asignacion masiva
    //1ra declarar cada uno de los campos
    //2do declarar los que no quiero que se asigne, el resto si, guarded define los campos que queremos desabilitar

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //1:n products y sizes
    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    //1:n inversa, porque va desde products hasta brands
    public function brands()
    {
        return $this->belongsTo(Brand::class);
    }

    //1:n inversa products y subcategories
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }

    //relacion 1:n polimorfica
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable'); //esta relacion le pasamos la clase y el metodo imageable del modelo Image 
    }
}
