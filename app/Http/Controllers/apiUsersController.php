<?php

namespace App\Http\Controllers;

use App\Http\Requests\userRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class apiUsersController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(userRequest $request)
    {
        $user=User::create([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'),)
        ])->assignRole('Usuario');
        return  parent::respuestaHTTP("Usuario creado satisfactoriamente.ID: ". $user->id, 201, true);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $usuario = User::findOrFail($id);
            $usuario->makeVisible(['id']);
            return $this->respuestaHTTP($usuario, 200, true);
        } catch (ModelNotFoundException $exception) {
            return $this->respuestaHTTP('Usuario no encontrado', 404, false);
        }
    }
}
