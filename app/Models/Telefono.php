<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    use HasFactory;

    protected $fillable = [
        'contacto_id', 'numero', 'tipo'
    ];

    // Relación inversa
    public function contacto()
    {
        return $this->belongsTo(Contacto::class);
    }
}

