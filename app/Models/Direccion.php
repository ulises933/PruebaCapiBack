<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;
    protected $table = 'direcciones'; 

    protected $fillable = [
        'contacto_id', 'direccion', 'ciudad', 'estado', 'pais', 'codigo_postal'
    ];

    // Relación inversa
    public function contacto()
    {
        return $this->belongsTo(Contacto::class);
    }
}

