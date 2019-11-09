@extends('layouts.admin')

@section('content')
    <div class="col-md-8 mb-5">
        {!! Form::open(['route'=>'clases', 'method' => 'GET','autocomplete'=>'off','role'=>'search','class' => 'form-group bg-light border-0 small', 'placeholder'=> 'Nombre de la materia']) !!}
        <div class="input-group">
            <input type="text" name="searchText" value="{{ $searchText }}"
                   aria-label="Search" aria-describedby="basic-addon2" placeholder="Nombre del grado"
                   class="form-control mt3">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
        {{ Form::close() }}
    </div>

    <h3 class=" mb-3 mt-0"><a href="clases/create" class="btn btn-warning">
            <li class="fas fa-plus"></li> Nuevo Grado
        </a></h3>
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card"
                 style="font-size: .875rem; width: 1200px; background: #eee; box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(233, 30, 99, 0.4);">
                <div class="card-header card-header-text card-header-warning"
                     style="z-index: 3 !important; color: #fff; border-bottom: none; background: transparent; border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;">
                    <div class="card-text"
                         style="box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(233, 30, 99, 0.4); background: linear-gradient(60deg, #fea423, #fb8d01); border-radius: 3px; margin-top: -20px; padding: 15px;">
                        <h4 class="card-title">Grados Actuales</h4>
                        <p class="card-category">Listado de grados en el perido #1, 2019.</p>
                    </div>
                </div>
                <div class="card-body table-responsive" style="flex: 1 1 auto;">
                    <table class="table table-hover">
                        <thead class="text-warning">
                        <tr>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th colspan="2">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($clases->count())
                            @foreach($clases as $cs)
                                <tr>
                                    <td>{{$cs->nombre}}</td>
                                    <td>
                                        @if($cs->imagen != "")
                                            <img src="{{ asset('img/clases/'.$cs->imagen) }}" height="80px" width="80px"
                                                 class="img-thumbnail">
                                        @else
                                            <img src="{{ asset('img/4.jpg') }}" height="80px" width="80px"
                                                 class="img-thumbnail">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ URL::action('ClasesController@edit',$cs->idclase) }}">
                                            <button class="btn btn-info">Editar</button>
                                        </a>
                                        <a href="" data-target="#modal-delete-{{ $cs->idclase }}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                                    </td>
{{--                                    <td>--}}
{{--                                        <form action="{{action('ClasesController@destroy', $cs->idclase)}}"--}}
{{--                                              method="post">--}}
{{--                                            {{csrf_field()}}--}}
{{--                                            <input name="_method" type="hidden" value="DELETE">--}}

{{--                                            <button class="btn btn-danger" type="submit" data-target="#modal-delete-{{ $cs->idclase }}">Borrar--}}
{{--                                            </button>--}}
{{--                                        </form>--}}
{{--                                    </td>--}}
                                </tr>
                                @include('Clases.modal')
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
