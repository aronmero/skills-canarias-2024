<?php

namespace App\Http\Controllers;

use App\Http\Requests\eventoRequest;
use App\Http\Requests\eventoUpdateRequest;
use App\Models\evento;
use App\Models\reserva;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class apiEventosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = evento::with('usuario')->get();
        return $this->respuestaHTTP($usuarios, 200, true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(eventoRequest $request)
    {
        $evento = evento::create($request->all());

        return parent::respuestaHTTP("Evento creado satisfactoriamente. ID: " . $evento->id, 201, true);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $evento = evento::with('usuario')->findOrFail($id);
            return $this->respuestaHTTP($evento, 200, true);
        } catch (ModelNotFoundException $exception) {
            return $this->respuestaHTTP('Evento no encontrado', 404, false);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(eventoUpdateRequest $request, string $id)
    {
        $evento = evento::find($id);

        if (!$evento) {
            return parent::respuestaHTTP("Evento no encontrado.", 404);
        }
        if (now() < $evento->fecha) {
            return parent::respuestaHTTP("Evento ya ocurrio", 200, true);
        }
        if ($evento->date !== $request->fecha) {
            $reserva = reserva::find($id);
            $reserva->fecha = $request->fecha;
        }

        $data = $request->all();

        $evento->update($data);


        return parent::respuestaHTTP("Evento actualizado satisfactoriamente.", 200, true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $evento = evento::findOrFail($id);

            if (now() < $evento->fecha) {
                $evento->delete();
                return response()->json(['message' => 'evento eliminado correctamente'], 204);
            }
            return response()->json(['message' => 'La fecha del evento es anterior a la actual'], 400);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => 'El evento no ha sido encontrado'], 404);
        }
    }
}
