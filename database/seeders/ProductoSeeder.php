<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'nombre' => 'Mouse',
            'descripcion' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'id_bodega' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Producto::create([
            'nombre' => 'Teclado',
            'descripcion' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'id_bodega' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Producto::create([
            'nombre' => 'Monitor',
            'descripcion' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'id_bodega' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
