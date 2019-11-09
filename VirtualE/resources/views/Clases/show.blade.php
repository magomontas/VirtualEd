@extends('layouts.admin')

{{--@push('links')--}}
{{--    <link rel="stylesheet" href="{{ asset('css/cssAD/all.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('css/cssAD/ionicons.min.css') }}">--}}
{{--    <!-- Theme style -->--}}
<link rel="stylesheet" href="{{ asset('css/cssAD/adminlte.min.css') }}">
{{--@endpush--}}

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Box Comment -->
            <div class="card card-widget">
                <div class="card-header">
                    <div class="user-block">
                        <img class="img-circle" src="{{ asset('img/user1-128x128.jpg') }}" alt="User Image">
                        <span class="username">Alonso Alas<a href="#"></a></span>
                        <span class="description">Ha asignado una tarea - 7:30 PM Ahora</span>
                    </div>
                    <!-- /.user-block -->
                    <div class="card-tools">
                        {{ $clases->nombre }}&nbsp;&nbsp;
                        <a href="#" class="fas fa-plus-circle" style="text-decoration: none" data-toggle="modal"
                           data-target="#exampleModalCenter">&nbsp;&nbsp; &nbsp;
                            <a href="{{ URL::action('ClasesController@listar',$clases->idclase) }}"><i
                                    class="fas fa-align-justify"></i></a> &nbsp;

                        </a>
                    </div>
                    <!-- /.card-tools -->
                </div>

                {{--                    navbar--}}
                <nav class="navbar navbar-expand-lg">
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="nav nav-pills">
                            @foreach($materias as $mt)
                                @if($mt->claseID == $clases->idclase)
                                    <li class="nav-item active">
{{--                                        <a class="nav-link" href="#activity" data-toggle="tab">{{ $mt->nombre }}</a>--}}
                                        <a class="nav-link" href="{{ URL::action('MateriaController@show', $mt->idmateria) }}">{{ $mt->nombre }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Agregar Actividad </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" class="form-group">
                    <div class="modal-body">
                        <div class="col-md-12 mt-3">
                            <input type="text" placeholder="Titulo de actividad" class="form-control"
                                   style="text-transform: uppercase; font-weight: bold;">
                        </div>
                        <div class="col-md-12 mt-3">
                            <input type="text" placeholder="Contenido de actividad" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
