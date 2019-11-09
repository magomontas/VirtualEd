<?php

namespace App\Http\Controllers;

use App\Tarea, DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas = Tarea::orderBy('id', 'DESC')
            ->paginate(10);

        return view('tareas.index', ['tareas'=>$tareas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id =  Auth::user()->id;
        $clases=DB::table('clases as c')->get();
        $materias=DB::table('materias')->get();
        return view('tareas.create', ['materias'=>$materias, 'clases'=>$clases, 'id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id =  Auth::user()->id;
        $tarea = new Tarea();
        $tarea->titulo = $request->get('titulo');
        $tarea->contenido = $request->get('contenido');
        $tarea->materias_id = $request->get('materias_id');
        $tarea->clases_id = $request->get('clases_id');
        $tarea->users_id = $id;

//        if (Input::hasFile('imagen')) {
//            $file = Input::file('imagen');
//            $file->move(public_path() . '/img/clases', $file->getClientOriginalName());
//            $tarea->imagen = $file->getClientOriginalName();
//        }


        $tarea->save();
        return redirect()->route('tareas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clases=DB::table('clases')->get();
        $materias=DB::table('materias')->get();
        return view("tareas.edit", ["tareas" => Tarea::findOrFail($id), 'clases'=>$clases, 'materias'=>$materias]);
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
        //
        $tarea = Tarea::find($id);
        $tarea->titulo = $request->get('titulo');
        $tarea->contenido = $request->get('contenido');
        $tarea->materias_id = $request->get('materias_id');
        $tarea->clases_id = $request->get('clases_id');

//        if (Input::hasFile('imagen')) {
//            $file = Input::file('imagen');
//            $file->move(public_path() . '/img/clases', $file->getClientOriginalName());
//            $clases->imagen = $file->getClientOriginalName();
//        }
        $tarea->save();

        return redirect()->route('tareas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tarea::find($id)->delete();

        return redirect()->route('tareas.index');
    }
}
