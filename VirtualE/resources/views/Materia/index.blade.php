@extends('layouts.admin')

@section('content')
    <a href="materias/create" class="btn btn-success mb-3"><li class="fas fa-plus"></li> Nueva Materia</a>
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card"
                 style="font-size: .875rem; width: 1200px; background: #eee; box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(233, 30, 99, 0.4);">
                <div class="card-header card-header-text card-header-warning"
                     style="z-index: 3 !important; color: #fff; border-bottom: none; background: transparent; border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;">
                    <div class="card-text"
                         style="box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(233, 30, 99, 0.4); background: linear-gradient(60deg, #1cc88a, #1cc88a); border-radius: 3px; margin-top: -20px; padding: 15px;">
                        <h4 class="card-title">Listado de materias</h4>
                        <p class="card-category">Materias de todos los grados del perido #1, 2019.</p>
                    </div>
                </div>
                <div class="card-body table-responsive" style="flex: 1 1 auto;">
                    <table class="table table-hover">
                        <thead class="text-success">
                        <tr>
                            <th>Nombre Materia</th>
                            <th>Descripcion</th>
                            <th>Codigo</th>
                            <th>Docente</th>
                            <th colspan="1" class="text-center">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($materia->count())
                            @foreach($materia as $mat)
                                <tr>
                                    <td>{{$mat->nombre}}</td>
                                    <td>{{$mat->descripcion}}</td>
                                    <td>{{$mat->codigo}}</td>
                                    <td>{{$mat->Docente}}</td>
                                    <td>
                                        <a href="{{ URL::action('MateriaController@edit',$mat->idmateria) }}"><button class="btn btn-info">Editar</button></a></td>
                                    <td>
                                        <form action="{{action('MateriaController@destroy', $mat->idmateria)}}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">

                                            <button class="btn btn-danger" type="submit"><span
                                                    class="glyphicon glyphicon-trash"></span>Borrar
                                            </button>
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
