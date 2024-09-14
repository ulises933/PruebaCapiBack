<?php

namespace App\Services;

use App\Repositories\DireccionRepository;

class DireccionService
{
    protected $direccionRepository;

    public function __construct(DireccionRepository $direccionRepository)
    {
        $this->direccionRepository = $direccionRepository;
    }

    public function crearDireccion($data)
    {
        return $this->direccionRepository->create($data);
    }

    public function actualizarDireccion($id, $data)
    {
        return $this->direccionRepository->update($id, $data);
    }

    public function eliminarDireccion($id)
    {
        return $this->direccionRepository->delete($id);
    }
}
