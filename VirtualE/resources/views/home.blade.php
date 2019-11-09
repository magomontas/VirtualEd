@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">
            @foreach($clases as $cl)
                <div class="col-md-4 mt-3">
                    <div class="card-deck">
                        <div class="card">
                            <div class="car-header">
                                @if($cl->imagen != "")
                                    <img src="{{ asset('img/clases/'.$cl->imagen) }}" width="350px" height="220px"
                                         class="card-img-top">
                                @else
                                    <img src="{{ asset('img/4.jpg') }}" class="card-img-top" width="350px"
                                         height="220px">
                                @endif
                            </div>

                            <div class="card-body">
                                <h5 class="card-title"><a
                                        href="{{ URL::action('ClasesController@show',$cl->idclase) }}">{{ $cl->nombre }}</a>
                                </h5>
                                <p class="card-text"></p>
                                <div class="btn-group">
                                        @foreach($materias as $mt)
                                            @if($mt->claseID == $cl->idclase)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="idmateria" id="inlineRadio1" value="{{ $mt->idmateria}}">
                                                    <label class="form-check-label" for="inlineRadio1">{{ $mt->nombre }}</label>
                                                </div>

{{--                                            <select name="id" id="" class="form-control form-control-user">--}}
{{--                                                <option value="{{ $mt->idmateria}}">{{ $mt->nombre}}</option>--}}
{{--                                            </select>--}}
                                            @endif
                                        @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


            {{--            --}}
        </div>
    </div>


@endsection
