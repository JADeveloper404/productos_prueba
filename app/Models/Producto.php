<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'id_bodega',
        'estado'
    ];

    public function bodega() {
        return $this->belongsTo(Bodega::class, 'id_bodega');
    }
}
