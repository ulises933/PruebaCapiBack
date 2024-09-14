<?php
namespace App\Services;

use App\Repositories\EmailRepository;

class EmailService
{
    protected $emailRepository;

    public function __construct(EmailRepository $emailRepository)
    {
        $this->emailRepository = $emailRepository;
    }

    public function crearEmail($data)
    {
        return $this->emailRepository->create($data);
    }

    public function actualizarEmail($id, $data)
    {
        return $this->emailRepository->update($id, $data);
    }

    public function eliminarEmail($id)
    {
        return $this->emailRepository->delete($id);
    }
}

