<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function createApi(Request $request)
    {
        try {
            $validated = $request->validate(
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users',
                    'password' => 'required'
                ],
                [
                    'name.required' => 'O campo nome é obrigatório.',
                    'email.required' => 'O campo email é obrigatório.',
                    'email.email' => 'O campo email deve ser um endereço de email válido.',
                    'email.unique' => 'Este email já está em uso.',
                    'password.required' => 'O campo senha é obrigatório.'
                ]
            );
            $user = User::create($validated);
            return response()->json($user, 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }


    public function indexApi()
    {
        $user = User::all();
        return $user;
    }
}
