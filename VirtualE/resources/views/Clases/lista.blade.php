@extends('layouts.admin')

@section('content')
    <div class="col-md-12 mb-5">
        {{--        {!! Form::open(['route'=> '/clases/lista)', 'method' => 'GET','autocomplete'=>'off','role'=>'search','class' => 'form-group bg-light border-0 small', 'placeholder'=> 'Nombre del estudiante']) !!}--}}
        <form method="GET" class="form-inline bg-light border-0 small" autocomplete="off"
              action="{{ URL::action('ClasesController@listar', $clases->idclase) }}">
            @method('GET')
            @csrf
            <input class="form-control mr-sm-2" name="searchText" type="search"
                   placeholder="Nombre del Estudiante" aria-label="Buscar">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
        </form>
        {{--        {{ Form::close() }}--}}
    </div>

    <div class="card">
        <div class="card-header">
            {{ $clases->nombre }}
            <p class="fa-pull-right">Materia&nbsp;
                <a href="#" class="fas fa-plus-circle" style="text-decoration: none" data-toggle="modal"
                   data-target="#exampleModalCenter">&nbsp;&nbsp;
                    <a href="#"><i class="fas fa-align-justify"></i></a>
                </a>
            </p>
        </div>
        <h5 class="card-title text-center mt-3">Listado de alumnos</h5>
        @foreach($usuarios as $c)
            <div class="card-body">
                <div class="row">
                    <div class="col-md-1">
                        <img src="{{ asset('img/h8.jpg') }}" style=" width: 70px; height: 70px; border-radius: 50%;">
                    </div>
                    <div class="col-md-6 mt-3">
                        <p>{{ $c->name }} {{ $c->apellidos }}
                            <a href="{{ URL::action('ClasesController@listar', $c->id) }}" class="fas fa-plus-circle"
                               style="text-decoration: none" data-toggle="modal"
                               data-target="#exampleModalCenter"></a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Agregar Usuario </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="GET" class="form-inline bg-light border-0 small" autocomplete="off"
                          action="{{ URL::action('UsuarioController@store') }}">
                        @method('GET')
                        @csrf
                        @foreach($usuarios as $c)
                            <input type="text" name="nombre" value="{{ $c->name }}" class="form-control"
                                   readonly>
                            <input type="hidden" name="email" value="{{ $c->email }}" class="form-control"
                                   readonly>
                            <input type="text" name="apellidos" value="{{ $c->apellidos }}" class="form-control"
                                   readonly>
                            <input type="hidden" name="password" value="{{ $c->password }}" class="form-control"
                                   readonly>
                            <input type="hidden" name="isAmin" value="{{ $c->isAdmin }}" class="form-control"
                                   readonly>
                        @endforeach
                    </form>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <a href="{{ URL::action('UsuarioController@store') }}" class="btn btn-outline-primary">Agregar</a>
                </div>
            </div>
        </div>
    </div>

@endsection
