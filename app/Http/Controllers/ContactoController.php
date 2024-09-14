<?php

namespace App\Http\Controllers;

use App\Services\ContactoService;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    protected $contactoService;

    public function __construct(ContactoService $contactoService)
    {
        $this->contactoService = $contactoService;
    }

    // Obtener todos los contactos
    public function index()
    {
        $contactos = $this->contactoService->obtenerContactos();
        return response()->json($contactos);
    }

    // Obtener un contacto por ID
    public function show($id)
    {
        try {
            $contacto = $this->contactoService->obtenerContactoPorId($id);
            return response()->json($contacto);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Contacto no encontrado'], 404);
        }
    }

    // Crear un nuevo contacto
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'notas' => 'nullable|string|max:1000',
            'fecha_cumple' => 'nullable|date',
            'pagina_web' => 'nullable|url|max:255',
            'empresa' => 'nullable|string|max:255',
            'telefonos' => 'nullable|array',
            'telefonos.*.numero' => 'required_with:telefonos|string|max:20',
            'telefonos.*.tipo' => 'nullable|string|in:Movil,Casa,Trabajo',
            'emails' => 'nullable|array',
            'emails.*.email' => 'required_with:emails|email|max:255',
            'emails.*.tipo' => 'nullable|string|in:Personal,Trabajo',
            'direcciones' => 'nullable|array',
            'direcciones.*.direccion' => 'required_with:direcciones|string|max:500',
            'direcciones.*.ciudad' => 'nullable|string|max:255',
            'direcciones.*.estado' => 'nullable|string|max:255',
            'direcciones.*.pais' => 'nullable|string|max:255',
            'direcciones.*.codigo_postal' => 'nullable|string|max:20'
        ]);

        try {
            $contacto = $this->contactoService->crearContacto($data);
            return response()->json($contacto, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear el contacto'], 400);
        }
    }

    // Actualizar un contacto
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'notas' => 'nullable|string|max:1000',
            'fecha_cumple' => 'nullable|date',
            'pagina_web' => 'nullable|url|max:255',
            'empresa' => 'nullable|string|max:255',
            'telefonos' => 'nullable|array',
            'telefonos.*.numero' => 'required_with:telefonos|string|max:20',
            'telefonos.*.tipo' => 'nullable|string|in:Movil,Casa,Trabajo',
            'emails' => 'nullable|array',
            'emails.*.email' => 'required_with:emails|email|max:255',
            'emails.*.tipo' => 'nullable|string|in:Personal,Trabajo',
            'direcciones' => 'nullable|array',
            'direcciones.*.direccion' => 'required_with:direcciones|string|max:500',
            'direcciones.*.ciudad' => 'nullable|string|max:255',
            'direcciones.*.estado' => 'nullable|string|max:255',
            'direcciones.*.pais' => 'nullable|string|max:255',
            'direcciones.*.codigo_postal' => 'nullable|string|max:20'
        ]);

        try {
            $contacto = $this->contactoService->actualizarContacto($id, $data);
            return response()->json($contacto);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el contacto: ' . $e->getMessage()], 400);
        }
    }

    // Eliminar un contacto
    public function destroy($id)
    {
        try {
            $this->contactoService->eliminarContacto($id);
            return response()->json(['message' => 'Contacto eliminado exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar el contacto'], 400);
        }
    }

    // Buscar contactos por ciudad
    public function buscarPorCiudad($ciudad)
    {
        try {
            $contactos = $this->contactoService->buscarContactosPorCiudad($ciudad);
            return response()->json($contactos);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al buscar contactos por ciudad'], 400);
        }
    }

    // Buscar contactos por empresa
    public function buscarPorEmpresa($empresa)
    {
        try {
            $contactos = $this->contactoService->buscarContactosPorEmpresa($empresa);
            return response()->json($contactos);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al buscar contactos por empresa'], 400);
        }
    }

    // Buscar contactos por nombre
    public function buscarPorNombre($nombre)
    {
        try {
            $contactos = $this->contactoService->buscarContactosPorNombre($nombre);
            return response()->json($contactos);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al buscar contactos por nombre'], 400);
        }
    }
}
