<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //borramos las antiguas imagenes
        Storage::deleteDirectory('products');

        //creo la carpeta products
        Storage::makeDirectory('products');

        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
    }
}
