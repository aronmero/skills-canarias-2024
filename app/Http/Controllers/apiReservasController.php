<?php

namespace App\Http\Controllers;

use App\Http\Requests\reservaRequest;
use App\Http\Requests\reservaUpdateRequest;
use App\Models\reserva;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class apiReservasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('can:admin.reservas.index')->only('index');
        $this->middleware('can:admin.reservas.store')->only('store');
        $this->middleware('can:admin.reservas.destroy')->only('destroy');
        $this->middleware('can:admin.reservas.show')->only('show');
        $this->middleware('can:admin.reservas.update')->only('update');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reserva = reserva::with(['evento', 'sala'])->get();
        return $this->respuestaHTTP($reserva, 200, true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(reservaRequest $request)
    {
   
        $reserva = reserva::create($request->all());

        return parent::respuestaHTTP("Reserva creada satisfactoriamente. ID: " . $reserva->id, 201, true);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $reserva = reserva::with(['evento', 'sala'])->findOrFail($id);
            return $this->respuestaHTTP($reserva, 200, true);
        } catch (ModelNotFoundException $exception) {
            return $this->respuestaHTTP('Reserva no encontradoa.', 404, false);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(reservaUpdateRequest $request, string $id)
    {
        $reserva = reserva::find($id);

        if (!$reserva) {
            return parent::respuestaHTTP("Reserva no encontrada.", 404);
        }

        if (now() >= $reserva->fecha) {
            return parent::respuestaHTTP("La reserva ya ocurrio", 200, true);
        }
        if ($reserva->date !== $request->fecha) {
            $reserva = reserva::find($id);
            $reserva->fecha = $request->fecha;
        }

        $data = $request->all();

        $reserva->update($data);


        return parent::respuestaHTTP("Reserva actualizado satisfactoriamente.", 200, true);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $reserva = reserva::findOrFail($id);
            if (now() < $reserva->fecha) {
                $reserva->delete();
                return response()->json(['message' => 'Reserva eliminado correctamente'], 204);
            }
            return response()->json(['message' => 'La Reserva es anterior a la actual'], 400);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => 'Reserva no encontrada'], 404);
        }
    }
}
