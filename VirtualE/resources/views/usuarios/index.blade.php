@extends('layouts.admin')

@section('content')
    <a href="usuarios/create" class="btn btn-info mb-3">
            <li class="fas fa-plus"></li> Nuevo
    </a>
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card"
                 style="font-size: .875rem; width: 1200px; background: #eee; box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(233, 30, 99, 0.4);">
                <div class="card-header card-header-text card-header-warning"
                     style="z-index: 3 !important; color: #fff; border-bottom: none; background: transparent; border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;">
                    <div class="card-text"
                         style="box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(233, 30, 99, 0.4); background: linear-gradient(60deg, #36b9cc, #36b9cc); border-radius: 3px; margin-top: -20px; padding: 15px;">
                        <h4 class="card-title">Listado de Usuarios</h4>
                        <p class="card-category">Listado de usuarios del ciclo #1, 2019.</p>
                    </div>
                </div>
                <div class="card-body table-responsive" style="flex: 1 1 auto;">
                    <table class="table table-hover">
                        <thead class="text-info">
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Apellidos</th>
                            <th>Nivel</th>
                            <th colspan="1" class="text-center">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($user->count())
                            @foreach($user as $us)
                                <tr>
                                    <td>{{$us->name}}</td>
                                    <td>{{$us->email}}</td>
                                    <td>{{$us->apellidos}}</td>
                                    @if($us->isAdmin == 0)
                                        <td>Estudiante</td>
                                    @else
                                        <td>Docente</td>
                                    @endif
                                    <td>
                                        <a href="{{ URL::action('UsuarioController@edit',$us->id) }}">
                                            <button class="btn btn-info">Editar</button>
                                        </a></td>
                                    <td>
                                        <form action="{{action('UsuarioController@destroy', $us->id)}}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">

                                            <button class="btn btn-danger" type="submit">Borrar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8">No hay registro !!</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
