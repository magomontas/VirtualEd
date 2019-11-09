@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Error!</strong> Revise los campos obligatorios.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-info">
                    {{Session::get('success')}}
                </div>
            @endif
        </div>

        <div class="col-md-8">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Crear Tarea!</h1>
                                </div>
                                {!! Form::open(array('url'=>'tareas','method'=>'POST','autocomplete'=>'off','files'=>'true', 'class'=>'form-group')) !!}
                                {{Form::token()}}
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                   placeholder="Titulo" name="titulo">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-4 mb-sm-0">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                   placeholder="Contenido" name="contenido">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-4 mb-sm-0">
                                        <div class="form-group">
                                            <select name="materias_id" id="" class="form-control">
                                                @foreach($materias as $m)
                                                    @if($m->idusuario == $id)
                                                    <option value="{{ $m->idmateria}}">{{ $m->nombre}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-4 mb-sm-0">
                                        <div class="form-group">
                                            <select name="clases_id" id="" class="form-control">
                                                @foreach($clases as $cl)
                                                    @if($cl->id == $id)
                                                    <option value="{{ $cl->idclase}}">{{ $cl->nombre}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="file" name="imagen" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Asignar Tarea
                                </button>
                                {!! Form::close() !!}
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
