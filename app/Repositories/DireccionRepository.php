<?php

namespace App\Repositories;

use App\Models\Direccion;

class DireccionRepository
{
    public function create(array $data)
    {
        return Direccion::create($data);
    }

    public function update($id, array $data)
    {
        $direccion = Direccion::findOrFail($id);
        $direccion->update($data);
        return $direccion;
    }

    public function delete($id)
    {
        $direccion = Direccion::findOrFail($id);
        $direccion->delete();
        return true;
    }
}

