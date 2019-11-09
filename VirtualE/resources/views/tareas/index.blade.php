@extends('layouts.admin')

@section('content')
        <a href="tareas/create" class="btn btn-primary mb-3">
            <li class="fas fa-plus"></li> Nueva
        </a>

    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card"
                 style="font-size: .875rem; width: 1200px; background: #eee; box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(233, 30, 99, 0.4);">
                <div class="card-header card-header-text card-header-warning"
                     style="z-index: 3 !important; color: #fff; border-bottom: none; background: transparent; border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;">
                    <div class="card-text"
                         style="box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(233, 30, 99, 0.4); background: linear-gradient(60deg, #4e73df, #4e73df); border-radius: 3px; margin-top: -20px; padding: 15px;">
                        <h4 class="card-title">Tareas Actuales</h4>
                        <p class="card-category">Listado de tareas en el perido #1, 2019.</p>
                    </div>
                </div>
                <div class="card-body table-responsive" style="flex: 1 1 auto;">
                    <table class="table table-hover">
                        <thead class="text-primary">
                        <tr>
                            <th>Titulo</th>
                            <th>Contenido</th>
                            <th colspan="2">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tareas as $t)
                            <tr>
                                <td>{{ $t->titulo }}</td>
                                <td>{{ $t->contenido }}</td>
                                <td><a href="{{ URL::action('TareaController@edit', $t->id) }}"
                                       class="btn btn-warning">Editar</a></td>
                                <td>
                                    <form action="{{action('TareaController@destroy', $t->id)}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">

                                        <button class="btn btn-danger" type="submit"><span
                                                class="glyphicon glyphicon-trash"></span>Borrar
                                        </button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
