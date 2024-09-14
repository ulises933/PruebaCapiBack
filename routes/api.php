<?php
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\TelefonoController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\DireccionController;
use Illuminate\Support\Facades\Route;

// Rutas para Contactos
Route::get('/contactos', [ContactoController::class, 'index']); // Obtener todos los contactos
Route::get('/contactos/{id}', [ContactoController::class, 'show']); // Obtener un contacto por ID
Route::post('/contactos', [ContactoController::class, 'store']); // Crear un nuevo contacto
Route::put('/contactos/{id}', [ContactoController::class, 'update']); // Actualizar un contacto
Route::delete('/contactos/{id}', [ContactoController::class, 'destroy']); // Eliminar un contacto
Route::get('/contactos/buscar/ciudad/{ciudad}', [ContactoController::class, 'buscarPorCiudad']); // Obtener un contacto por Ciudad
Route::get('/contactos/buscar/empresa/{empresa}', [ContactoController::class, 'buscarPorEmpresa']); // Obtener un contacto por Empresa
Route::get('/contactos/buscar/nombre/{nombre}', [ContactoController::class, 'buscarPorNombre']); // Obtener un contacto por Nombre

// Rutas para Teléfonos
Route::post('/telefonos', [TelefonoController::class, 'store']); // Crear un nuevo teléfono
Route::put('/telefonos/{id}', [TelefonoController::class, 'update']); // Actualizar un teléfono
Route::delete('/telefonos/{id}', [TelefonoController::class, 'destroy']); // Eliminar un teléfono

// Rutas para Emails
Route::post('/emails', [EmailController::class, 'store']); // Crear un nuevo email
Route::put('/emails/{id}', [EmailController::class, 'update']); // Actualizar un email
Route::delete('/emails/{id}', [EmailController::class, 'destroy']); // Eliminar un email

// Rutas para Direcciones
Route::post('/direcciones', [DireccionController::class, 'store']); // Crear una nueva dirección
Route::put('/direcciones/{id}', [DireccionController::class, 'update']); // Actualizar una dirección
Route::delete('/direcciones/{id}', [DireccionController::class, 'destroy']); // Eliminar una dirección
