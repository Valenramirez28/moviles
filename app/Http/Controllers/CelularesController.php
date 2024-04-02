<?php

namespace App\Http\Controllers;

use App\Models\celulares;
use Illuminate\Http\Request;

class CelularesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listado['celulares'] = celulares::paginate(4);

        return view('celulares.index', $listado);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Acceder a create.blade.php de la vista para crear los empleados
        return view('celulares.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validación de los campos al crear un registro

        $validacion = [
            'marca'=>'required|string|max:30',
            'nombre_modelo'=>'required|string|max:30',
            'memoria_interna'=>'required|string|max:30',
            'memoria_ram'=>'required|string|max:30',
            'resolucion_camara'=>'required|string|max:30',
            'precio' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|max:5000000',
            'stock'=>'required|integer|max:1000',
        ];

        $msj=[
            'required'=>'El/La :attribute es requerida/o'

        ];

        $this-> validate($request, $validacion, $msj);

        //$datosCelulares = request()->all();
        $datosCelulares = request()->except('_token');
        celulares::insert($datosCelulares);
        //return response()->json($datosCelulares);
        return redirect('celulares')->with('mensaje','Registro Exitoso');
    }

    /**
     * Display the specified resource.
     */
    public function show(celulares $celulares)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $celulares = celulares::findOrFail($id);
        return view('celulares.update', compact('celulares'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $validacion = [
            'nombre_modelo'=>'required|string|max:30',
            'marca'=>'required|string|max:30',
            'memoria_interna'=>'required|string|max:30',
            'memoria_ram'=>'required|string|max:30',
            'resolucion_camara'=>'required|string|max:30',
            'precio' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|max:5000000',
            'stock'=>'required|integer|max:1000',

        ];

        $msj=['required'=>'El/La :attribute es requerida/o'];
        $this-> validate($request, $validacion, $msj);

        //Sino selecciono una nueva foto sigue con la que ya tenia anteriormente
        $datos = request()->except(['_token','_method']);
        celulares::where('id','=',$id)->update($datos);

        $celulares = celulares::findOrFail($id);
        //return view('celulares.update', compact('celulares'));
        return redirect('celulares')->with('mensaje','Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //busca la imagen que viene del id seleccionado y si la encuentra la borra
        $celulares = celulares::findOrFail($id);
        $celulares->delete();
        return redirect('celulares')->with('mensaje','Registro Eliminado Exitosamente');

    }

}
