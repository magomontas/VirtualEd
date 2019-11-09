@extends('layouts.admin')

@section('content')
    <div class="col-xl-12 col-lg-12 col-md-12">
        <!-- Area Chart -->
        @foreach($tareas as $t)
                <div class="card shadow mb-4">
                    @if($t->materias_id == $materia->idmateria)
                        <img src="{{ asset('img/ad2.png') }}" alt="Photo" style="border-radius: 10px">
                        <b class="text-uppercase"><p>{{ $t->titulo }}</p></b>
                        <p>{{ $t->contenido }}</p>

                        <div class="card-footer card-comments">
                            <div class="card-comment">
                                <!-- User image -->

                                <div class="comment-text">
                                    <img src="{{ asset('img/user3-128x128.jpg') }}"
                                         style="border-radius: 50%; height: 50px; width: 50px;" alt="User Image">&nbsp;&nbsp;
                                    <span class="username">Mariela Landaverde</span>
                                    <span class="text-muted float-right">8:03 PM Ahora</span>
                                    Considero que si pero ademas de eso representa limpieza pura, pero esto es
                                    puntos de
                                    parcial?.
                                </div>
                                <!-- /.comment-text -->
                            </div>
                            <!-- /.card-comment -->
                            <div class="card-comment">
                                <!-- User image -->

                                <div class="comment-text">
                                    <img class="img-circle img-sm" src="{{ asset('img/user1-128x128.jpg') }}"
                                         alt="User Image" style="border-radius: 50%; height: 50px; width: 50px;"
                                         alt="User Image">&nbsp;&nbsp;
                                    <span class="username">Alonso Alas </span>
                                    <span class="text-muted float-right">8:04 PM Ahora</span>

                                    Exacto mi estimada es para el parcial.
                                </div>
                                <!-- /.comment-text -->
                            </div>
                            <!-- /.card-comment -->
                        </div>
                        <!-- /.card-footer -->
                        <div class="card-footer">
                            <form class="form-inline" method="POST" action="#">
                                <input class="form-control col-md-11" type="search"
                                       placeholder="Presione para agregar un comentario...">
                                <button class="btn btn-outline-success" type="submit">Enviar</button>
                            </form>
                        </div>
                    @endif
                </div>
                @endforeach
    </div>
@endsection
