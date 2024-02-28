<?php

namespace App\Http\Controllers;

use App\Models\sala;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class apiSalasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sala = sala::all();
        return $this->respuestaHTTP($sala, 200, true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $etiqueta = sala::findOrFail($id);
            return $this->respuestaHTTP($etiqueta, 200, true);
        } catch (ModelNotFoundException $exception) {
            return $this->respuestaHTTP('Sala no encontrada.', 404, false);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
