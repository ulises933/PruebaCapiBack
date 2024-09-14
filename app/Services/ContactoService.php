<?php
namespace App\Services;

use App\Repositories\ContactoRepository;
use App\Repositories\TelefonoRepository;
use App\Repositories\EmailRepository;
use App\Repositories\DireccionRepository;

class ContactoService
{
    protected $contactoRepository;
    protected $telefonoRepository;
    protected $emailRepository;
    protected $direccionRepository;

    public function __construct(
        ContactoRepository $contactoRepository,
        TelefonoRepository $telefonoRepository,
        EmailRepository $emailRepository,
        DireccionRepository $direccionRepository
    ) {
        $this->contactoRepository = $contactoRepository;
        $this->telefonoRepository = $telefonoRepository;
        $this->emailRepository = $emailRepository;
        $this->direccionRepository = $direccionRepository;
    }

    // Obtener todos los contactos
    public function obtenerContactos()
    {
        return $this->contactoRepository->all();
    }

    // Crear un nuevo contacto
    public function crearContacto($data)
    {
        $contacto = $this->contactoRepository->create($data);

        if (isset($data['telefonos'])) {
            foreach ($data['telefonos'] as $telefono) {
                $this->telefonoRepository->create([
                    'contacto_id' => $contacto->id,
                    'numero' => $telefono['numero'],
                    'tipo' => $telefono['tipo'] ?? null
                ]);
            }
        }

        if (isset($data['emails'])) {
            foreach ($data['emails'] as $email) {
                $this->emailRepository->create([
                    'contacto_id' => $contacto->id,
                    'email' => $email['email'],
                    'tipo' => $email['tipo'] ?? null
                ]);
            }
        }

        if (isset($data['direcciones'])) {
            foreach ($data['direcciones'] as $direccion) {
                $this->direccionRepository->create([
                    'contacto_id' => $contacto->id,
                    'direccion' => $direccion['direccion'],
                    'ciudad' => $direccion['ciudad'] ?? null,
                    'estado' => $direccion['estado'] ?? null,
                    'pais' => $direccion['pais'] ?? null,
                    'codigo_postal' => $direccion['codigo_postal'] ?? null
                ]);
            }
        }

        return $contacto;
    }

    // Actualizar un contacto
    public function actualizarContacto($id, $data)
    {
        $contacto = $this->contactoRepository->update($id, $data);

        // Actualizar teléfonos
        if (isset($data['telefonos'])) {
            foreach ($data['telefonos'] as $telefono) {
                if (isset($telefono['id'])) {
                    $this->telefonoRepository->update($telefono['id'], $telefono);
                } else {
                    $this->telefonoRepository->create([
                        'contacto_id' => $contacto->id,
                        'numero' => $telefono['numero'],
                        'tipo' => $telefono['tipo'] ?? null
                    ]);
                }
            }
        }

        // Actualizar emails
        if (isset($data['emails'])) {
            foreach ($data['emails'] as $email) {
                if (isset($email['id'])) {
                    $this->emailRepository->update($email['id'], $email);
                } else {
                    $this->emailRepository->create([
                        'contacto_id' => $contacto->id,
                        'email' => $email['email'],
                        'tipo' => $email['tipo'] ?? null
                    ]);
                }
            }
        }

        // Actualizar direcciones
        if (isset($data['direcciones'])) {
            foreach ($data['direcciones'] as $direccion) {
                if (isset($direccion['id'])) {
                    $this->direccionRepository->update($direccion['id'], $direccion);
                } else {
                    $this->direccionRepository->create([
                        'contacto_id' => $contacto->id,
                        'direccion' => $direccion['direccion'],
                        'ciudad' => $direccion['ciudad'] ?? null,
                        'estado' => $direccion['estado'] ?? null,
                        'pais' => $direccion['pais'] ?? null,
                        'codigo_postal' => $direccion['codigo_postal'] ?? null
                    ]);
                }
            }
        }

        return $contacto;
    }

    // Eliminar un contacto
    public function eliminarContacto($id)
    {
        return $this->contactoRepository->delete($id);
    }

    public function buscarContactosPorCiudad($ciudad)
    {
        return $this->contactoRepository->buscarPorCiudad($ciudad);
    }

    public function buscarContactosPorEmpresa($empresa)
    {
        return $this->contactoRepository->buscarPorEmpresa($empresa);
    }

    public function buscarContactosPorNombre($nombre)
    {
        return $this->contactoRepository->buscarPorNombre($nombre);
    }
}
