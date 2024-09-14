<?php
namespace App\Http\Controllers;

use App\Services\EmailService;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    // Crear un email
    public function store(Request $request)
    {
        $data = $request->validate([
            'contacto_id' => 'required|integer|exists:contactos,id',
            'email' => 'required|string|email|max:255',
            'tipo' => 'nullable|string|in:Personal,Trabajo'
        ]);

        $email = $this->emailService->crearEmail($data);
        return response()->json($email, 201);
    }

    // Actualizar un email
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'email' => 'required|string|email|max:255',
            'tipo' => 'nullable|string|in:Personal,Trabajo'
        ]);

        try {
            $email = $this->emailService->actualizarEmail($id, $data);
            return response()->json($email);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el email'], 400);
        }
    }

    // Eliminar un email
    public function destroy($id)
    {
        try {
            $this->emailService->eliminarEmail($id);
            return response()->json(['message' => 'Email eliminado exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar el email'], 400);
        }
    }
}
