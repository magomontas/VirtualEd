<?php

namespace App\Http\Controllers;

use App\Clase;
use App\DetalleMateria;
use App\Materia;
use App\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('id', 'DESC')->paginate(10);
        return view('usuarios.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clases = Clase::orderBy('idclase', 'DESC')->get();
        $user = User::orderBy('id', 'DESC')->paginate(10);
        $materias = Materia::orderBy('idmateria', 'DESC')->get();

        return view('usuarios.create', ['user'=>$user,'clases'=>$clases,'materias'=>$materias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        try {
//            DB::beginTransaction();
//            $user = new User();
//            $user->name = $request->get('nombre');
//            $user->email = $request->get('email');
//            $user->password = Hash::make( $request->get('password'));
//            $user->apellidos = $request->get('apellidos');
//            $user->isAdmin = $request->get('isAdmin');
//            $user->save();
//
//            $idusuario = $request->get('idusuario');
//            $idmateria = $request->get('idmateria');
//            $idclase = $request->get('idclase');
//
//            $cont = 0;
//            while ($cont < count($idusuario)) {
//                $detalle = new DetalleMateria();
//                $detalle->idusuario = $user->idusuario;
//                $detalle->idmateria = $user->idmateria;
//                $detalle->idclase = $user->idclase;
//                $detalle->save();
//                $cont = $cont + 1;
//            }
//
//            DB::commit();
//        } catch (\Exeption $e) {
//            DB::rollback();
//        }

        $request->validate([
            'nombre'=>'required',
            'email'=> 'required',
            'password' => 'required',
            'apellidos' => 'required'
        ]);

//        $detalleM = new DetalleMateria();
//        $detalleM->idusuario = $request->get('idusario');
//        $detalleM->idmateria = $request->get('idmateria');
//        $detalleM->idclase   = $request->get('idclase');
//        $detalleM->save();

        $user = new User();
        $user->name = $request->get('nombre');
        $user->email = $request->get('email');
        $user->password = Hash::make( $request->get('password'));
        $user->apellidos = $request->get('apellidos');
        $user->isAdmin = $request->get('isAdmin');

        $user->save();
        return redirect()->route('usuarios.index')->with('success', 'Registro creado satisfactoriamente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $detalleM = new DetalleMateria();
        $detalleM->idusuario = $request->get('idusuario');
        $detalleM->idmateria = $request->get('idmateria');
        $detalleM->idclase   = $request->get('idclase');
        $detalleM->save();

//        $user = new User();
//        $user->name = $request->get('nombre');
//        $user->email = $request->get('email');
//        $user->password = Hash::make( $request->get('password'));
//        $user->apellidos = $request->get('apellidos');
//        $user->isAdmin = $request->get('isAdmin');

//        $user->save();
        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarios= User::findOrFail($id);
        return view('usuarios.edit',compact('usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        $request->validate([
//            'nombre'=>'required',
//            'apellidos'=> 'required',
//        ]);

        $user = User::find($id);
        $user->name = $request->get('nombre');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->apellidos = $request->get('apellidos');
        $user->isAdmin = $request->get('isAdmin');
        $user->save();

        return redirect()->route('usuarios.index')->with('success', 'Stock has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('usuarios.index')->with('success','Registro eliminado satisfactoriamente');
    }

    public function profile()
    {
        return view('usuarios.profile');
    }

}
