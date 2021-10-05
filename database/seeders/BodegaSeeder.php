<?php

namespace Database\Seeders;

use App\Models\Bodega;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BodegaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bodega::create([
            'nombre' => 'Cabecera',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Bodega::create([
            'nombre' => 'Cabecera',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
