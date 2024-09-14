<?php

namespace App\Repositories;

use App\Models\Contacto;

class ContactoRepository
{
    public function all()
    {
        return Contacto::with(['telefonos', 'emails', 'direcciones'])->paginate(50);
    }

    public function find($id)
    {
        return Contacto::with(['telefonos', 'emails', 'direcciones'])->findOrFail($id);
    }

    public function create(array $data)
    {
        return Contacto::create($data);
    }

    public function update($id, array $data)
    {
        $contacto = $this->find($id);
        $contacto->update($data);
        return $contacto;
    }

    public function delete($id)
    {
        $contacto = $this->find($id);
        $contacto->delete();
        return true;
    }

    public function buscarPorCiudad($ciudad)
    {
        return Contacto::whereHas('direcciones', function ($query) use ($ciudad) {
            $query->where('ciudad', 'like', '%' . $ciudad . '%');
        })->with(['telefonos', 'emails', 'direcciones'])->get();
    }

    public function buscarPorEmpresa($empresa)
    {
        return Contacto::where('empresa', 'like', '%' . $empresa . '%')
                       ->with(['telefonos', 'emails', 'direcciones'])->get();
    }

    public function buscarPorNombre($nombre)
    {
        return Contacto::where('nombre', 'like', '%' . $nombre . '%')
                       ->with(['telefonos', 'emails', 'direcciones'])->get();
    }
}
