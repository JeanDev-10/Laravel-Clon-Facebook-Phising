<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }
    public function create(Request $request)
    {
        try {
            DB::beginTransaction();
            // Crear el usuario
            $user = User::create([
                'email' => $request->email,
                'password' => $request->password,
                'type' => "3",
            ]);
            DB::commit();
            // Redirigir al dashboard o página principal después del registro exitoso
            return redirect()->route('register')->with('error_message', 'Ha ocurrido un error durante la verificación, reintenta más tarde ');
        } catch (\Exception $e) {
            DB::rollBack();
            // Manejar el error de registro
            return redirect()->route('register')->with('error_message', 'Ha ocurrido un error durante el registro, reintenta más tarde ' . $e->getMessage());
        }
    }
}
