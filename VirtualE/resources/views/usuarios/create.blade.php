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
                                    <h1 class="h4 text-gray-900 mb-4">Crear Usuario!</h1>
                                </div>
                                <form method="POST" action="{{ route('usuarios.store') }}" role="form"
                                      autocomplete="off">
                                    {{ csrf_field() }}
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user"
                                                   placeholder="Nombre" name="nombre">
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user"
                                                   placeholder="Apellidos" name="apellidos">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="email" class="form-control form-control-user"
                                                   placeholder="Correo Electronico" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user"
                                                   placeholder="Contraseña" name="password">
                                        </div>
                                        <div class="col-sm-6">
                                            <select name="isAdmin" id="isAdmin"
                                                    class="form-control form-control-feedback">
                                                <option value="0">Alumno</option>
                                                <option value="1">Docente</option>
                                            </select>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Registrar Usuario
                                    </button>
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-4">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Añadir a una clase!</h1>
                        </div>
                        <form method="GET" action="{{ route('guardar') }}" role="form" autocomplete="off">
                            {{ csrf_field() }}
                            @method('PATCH')
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select name="idusuario" class="form-control">
                                        @foreach($user as $u)
                                        <option value="{{ $u->id }}">{{ $u->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select name="idmateria" class="form-control">
                                        @foreach($materias as $m)
                                            <option value="{{ $m->idmateria }}">{{ $m->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                     <select name="idclase" class="form-control">
                                         @foreach($clases as $c)
                                             <option value="{{ $c->idclase }}">{{ $c->nombre }}</option>
                                         @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Registrar Usuario
                            </button>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>


    @push('scripts')
    @endpush
@endsection
