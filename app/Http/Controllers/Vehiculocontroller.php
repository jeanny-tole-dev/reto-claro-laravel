<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class VehiculoController extends Controller
{

    public function index(Request $request)
    {
        $buscar = $request->buscar;

        $vehiculos = Vehiculo::when($buscar, function ($query, $buscar) {
            $query->where('marca', 'LIKE', "%$buscar%")
                ->orWhere('placa', 'LIKE', "%$buscar%")
                ->orWhere('modelo', 'LIKE', "%$buscar%")
                ->orWhere('color', 'LIKE', "%$buscar%");
        })
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        return view('vehiculos.index', compact('vehiculos', 'buscar'));
    }

   
    public function create()
    {
        return view('vehiculos.create');
    }

    
    public function store(Request $request)
    {
        $data = $this->validarDatos($request);
        Vehiculo::create($data);

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehículo registrado correctamente.');
    }


    public function edit(Vehiculo $vehiculo)
    {
        return view('vehiculos.edit', compact('vehiculo'));
    }

    
    public function update(Request $request, Vehiculo $vehiculo)
    {
        $data = $this->validarDatos($request, $vehiculo->id);
        $vehiculo->update($data);

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehículo actualizado correctamente.');
    }


    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();
        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehículo eliminado con éxito.');
    }

    
    private function validarDatos(Request $request, $id = null)
    {
        $reglas = [
            
            'placa' => 'required|regex:/^[A-Z]{3}[0-9]{3}$/i|unique:vehiculos,placa,' . $id,
            'marca' => 'required|string',
            'modelo' => 'required|numeric|min:1900|max:' . (date('Y') + 1),
            'color' => 'required|string',
            'accidente' => 'required|string',
            'fecha_compra' => 'required|date|before_or_equal:today',
        ];

        $mensajes = [
            'placa.regex' => 'La placa debe tener 3 letras y 3 números (Ej: ABC123).',
            'placa.unique' => 'La placa ya está registrada.',
            'fecha_compra.before_or_equal' => 'La fecha no puede ser futura.',
            'required' => 'Este campo es obligatorio.'
        ];

       
        $request->validate($reglas, $mensajes);

      
        $añoCompra = Carbon::parse($request->fecha_compra)->year;

        if ($añoCompra < $request->modelo) {
            throw ValidationException::withMessages([
                'fecha_compra' => 'La fecha de compra no puede ser menor al modelo.'
            ]);
        }

        return $request->only(['placa', 'marca', 'modelo', 'color', 'accidente', 'fecha_compra']);
    }
}