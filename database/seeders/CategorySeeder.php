<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Celulares y tablets',
                'slug' => Str::slug('Celulares y tablets'), //la clase Str me permite usar slug
                'icon' => '<i class="fa-solid fa-mobile-screen"></i>'
            ],
            [
                'name' => 'TV, audio y video',
                'slug' => Str::slug('TV, audio y video'), //la clase Str me permite usar slug
                'icon' => '<i class="fa-solid fa-tv-music"></i>'
            ],
            [
                'name' => 'Consola y videojuegos',
                'slug' => Str::slug('Consola y videojuegos'), //la clase Str me permite usar slug
                'icon' => '<i class="fa-solid fa-gamepad-modern"></i>'
            ],
            [
                'name' => 'Computacion',
                'slug' => Str::slug('Computacion'), //la clase Str me permite usar slug
                'icon' => '<i class="fa-solid fa-laptop"></i>'
            ],
            [
                'name' => 'Moda',
                'slug' => Str::slug('Moda'), //la clase Str me permite usar slug
                'icon' => '<i class="fa-solid fa-shirt"></i>'
            ],
        ];


        foreach ($categories as $category) {
            $category = Category::factory(1)->create($category)->first();

            $brands = Brand::factory(4)->create();

            foreach ($brands as $brand) {
                $brand->categories()->attach($category->id); //el metodo attach introduce registros en la tabla intermedia
            }
        }
    }
}
