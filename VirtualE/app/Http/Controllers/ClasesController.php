<?php

namespace App\Http\Controllers;

use App\Clase;
use App\Materia;
use App\Tarea;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ClasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $clases = Clase::orderBy('idclase', 'DESC')
                ->where('nombre', 'LIKE', '%' . $query . '%')
                ->paginate(10);

            return view('clases.index', ['clases' => $clases, 'searchText' => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id =  Auth::user()->id;
        $clase = new Clase();
        $clase->nombre = $request->get('nombre');
        $clase->id = $id;
        if (Input::hasFile('imagen')) {
            $file = Input::file('imagen');
            $file->move(public_path() . '/img/clases', $file->getClientOriginalName());
            $clase->imagen = $file->getClientOriginalName();
        }


        $clase->save();
        return redirect()->route('clases.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tareas = DB::table('tareas as t')
            ->join('users as u', 't.users_id', '=', 'u.id')
            ->select('t.titulo','t.contenido', 'u.name', 'u.id')
            ->get();


        $materias = DB::table('materias as m')
            ->join('clases as c', 'm.idclase', '=', 'c.idclase')
            ->join('users as u', 'm.idusuario', '=', 'u.id')
            ->select('m.idmateria', 'm.nombre', 'm.codigo', 'm.descripcion', 'c.nombre as Clase', 'u.name as Docente', 'u.apellidos', 'm.idclase', 'c.idclase as claseID')
            ->paginate(10);

        return view('clases.show', ["clases"=>Clase::findOrFail($id), 'materias'=>$materias, 'tareas'=>$tareas]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listar(Request $request, $id)
    {

        if ($request){
            $query = trim($request->get('searchText'));
            $usuarios = DB::table('users')
                ->select('id', 'name', 'apellidos', 'email', 'password', 'isAdmin')
                ->where('name', 'LIKE', '%' . $query . '%')
                ->orwhere('apellidos', 'LIKE', '%' . $query . '%')
                ->get();
            $materias = Materia::orderBy('idmateria', 'DESC')
                ->get();

            return view('clases.lista', ["clases"=>Clase::findOrFail($id), 'searchText' => $query, 'usuarios'=>$usuarios, "materias"=>$materias]);
        }

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clases= Clase::findOrFail($id);
        return view('clases.edit', compact('clases'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clases = Clase::find($id);
        $clases->nombre = $request->get('nombre');
        if (Input::hasFile('imagen')) {
            $file = Input::file('imagen');
            $file->move(public_path() . '/img/clases', $file->getClientOriginalName());
            $clases->imagen = $file->getClientOriginalName();
        }
        $clases->save();

        return redirect()->route('clases.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Clase::find($id)->delete();
        return redirect()->route('clases.index');
        //
    }
}
