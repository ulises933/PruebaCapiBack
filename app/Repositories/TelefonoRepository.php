<?php

namespace App\Repositories;

use App\Models\Telefono;

class TelefonoRepository
{
    public function create(array $data)
    {
        return Telefono::create($data);
    }

    public function update($id, array $data)
    {
        $telefono = Telefono::findOrFail($id);
        $telefono->update($data);
        return $telefono;
    }

    public function delete($id)
    {
        $telefono = Telefono::findOrFail($id);
        $telefono->delete();
        return true;
    }
}
