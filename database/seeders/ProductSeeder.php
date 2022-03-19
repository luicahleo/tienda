<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //el metodo each funciona como un foreach, por cada producto, crea otros 4 de imageable id o algo asi
        Product::factory(250)->create()->each(function(Product $product){
            Image::factory(4)->create([
                'imageable_id' => $product->id,
                'imageable_type' => Product::class
            ]);
        });
    }
}
