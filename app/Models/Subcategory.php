<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    //hay dos maneras de la usar la asignacion masiva
    //1ra declarar cada uno de los campos
    //2do declarar los que no quiero que se asigne, el resto si, guarded define los campos que queremos desabilitar

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //relacion 1:n entre subcategories y products
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    //tambien hay la relacion inversa entre subcategories y categories
    //la ponemos en singular porque una subcategoria solo puede tener una categoria, asi que no tiene sentido ponerle categories
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
