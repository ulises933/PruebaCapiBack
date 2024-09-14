<?php
namespace App\Http\Controllers;

use App\Services\DireccionService;
use Illuminate\Http\Request;

class DireccionController extends Controller
{
    protected $direccionService;

    public function __construct(DireccionService $direccionService)
    {
        $this->direccionService = $direccionService;
    }

    // Crear una dirección
    public function store(Request $request)
    {
        $data = $request->validate([
            'contacto_id' => 'required|integer|exists:contactos,id',
            'direccion' => 'required|string|max:500',
            'ciudad' => 'nullable|string|max:255',
            'estado' => 'nullable|string|max:255',
            'pais' => 'nullable|string|max:255',
            'codigo_postal' => 'nullable|string|max:20'
        ]);

        $direccion = $this->direccionService->crearDireccion($data);
        return response()->json($direccion, 201);
    }

    // Actualizar una dirección
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'direccion' => 'required|string|max:500',
            'ciudad' => 'nullable|string|max:255',
            'estado' => 'nullable|string|max:255',
            'pais' => 'nullable|string|max:255',
            'codigo_postal' => 'nullable|string|max:20'
        ]);

        try {
            $direccion = $this->direccionService->actualizarDireccion($id, $data);
            return response()->json($direccion);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar la dirección'], 400);
        }
    }

    // Eliminar una dirección
    public function destroy($id)
    {
        try {
            $this->direccionService->eliminarDireccion($id);
            return response()->json(['message' => 'Dirección eliminada exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar la dirección'], 400);
        }
    }
}
