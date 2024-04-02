<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listado['clientes'] = clientes::paginate(4);

        return view('clientes.index', $listado);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Acceder a create.blade.php de la vista para crear los empleados
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validación de los campos al crear un registro

        $validacion = [
            'documento'=>'required|biginteger|max:2000000000',
            'nombres'=>'required|string|max:30',
            'apellidos'=>'required|string|max:40',
            'telefono'=>'required|string|max:4000000000',
            'direccion'=>'required|string|max:30',
        ];

        $msj=[
            'required'=>'La/El :attribute es requerido/a'

        ];

        $this-> validate($request, $validacion, $msj);

        //$datosCelulares = request()->all();
        $datosCelulares = request()->except('_token');
        clientes::insert($datosClientes);
        //return response()->json($datosClientes);
        return redirect('clientes')->with('mensaje','Registro Exitoso');
    }

    /**
     * Display the specified resource.
     */
    public function show(clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $clientes = clientes::findOrFail($id);
        return view('clientes.update', compact('clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $validacion = [
            'documento'=>'required|biginteger|max:2000000000',
            'nombres'=>'required|string|max:30',
            'apellidos'=>'required|string|max:40',
            'telefono'=>'required|string|max:4000000000',
            'direccion'=>'required|string|max:30',
        ];

        $msj=['required'=>'La/El :attribute es requerido/a'];
        $this-> validate($request, $validacion, $msj);

        //Sino selecciono una nueva foto sigue con la que ya tenia anteriormente
        $datos = request()->except(['_token','_method']);
        clientes::where('id','=',$id)->update($datos);

        $clientes = clientes::findOrFail($id);
        //return view('clientes.update', compact('clientes'));
        return redirect('clientes')->with('mensaje','Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //busca la imagen que viene del id seleccionado y si la encuentra la borra
        $clientes = clientes::findOrFail($id);
        $clientes->delete();
        return redirect('clientes')->with('mensaje','Registro Eliminado Exitosamente');

    }

}
