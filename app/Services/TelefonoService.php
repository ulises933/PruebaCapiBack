<?php
namespace App\Services;

use App\Repositories\TelefonoRepository;

class TelefonoService
{
    protected $telefonoRepository;

    public function __construct(TelefonoRepository $telefonoRepository)
    {
        $this->telefonoRepository = $telefonoRepository;
    }

    public function crearTelefono($data)
    {
        return $this->telefonoRepository->create($data);
    }

    public function actualizarTelefono($id, $data)
    {
        return $this->telefonoRepository->update($id, $data);
    }

    public function eliminarTelefono($id)
    {
        return $this->telefonoRepository->delete($id);
    }
}
