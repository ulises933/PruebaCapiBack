<?php

namespace App\Http\Controllers;

use App\Services\TelefonoService;
use Illuminate\Http\Request;

class TelefonoController extends Controller
{
    protected $telefonoService;

    public function __construct(TelefonoService $telefonoService)
    {
        $this->telefonoService = $telefonoService;
    }

    // Crear un teléfono
    public function store(Request $request)
    {
        $data = $request->validate([
            'contacto_id' => 'required|integer|exists:contactos,id',
            'numero' => 'required|string|max:20',
            'tipo' => 'nullable|string|in:Movil,Casa,Trabajo'
        ]);

        $telefono = $this->telefonoService->crearTelefono($data);
        return response()->json($telefono, 201);
    }

    // Actualizar un teléfono
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'numero' => 'required|string|max:20',
            'tipo' => 'nullable|string|in:Movil,Casa,Trabajo'
        ]);

        try {
            $telefono = $this->telefonoService->actualizarTelefono($id, $data);
            return response()->json($telefono);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el teléfono'], 400);
        }
    }

    // Eliminar un teléfono
    public function destroy($id)
    {
        try {
            $this->telefonoService->eliminarTelefono($id);
            return response()->json(['message' => 'Teléfono eliminado exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar el teléfono'], 400);
        }
    }
}