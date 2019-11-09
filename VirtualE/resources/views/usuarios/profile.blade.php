@extends('layouts.admin')

<style>
    .widget-user-desc{
        color: #fff;
        font-size: 24px;
        font-weight: bold;
    }
</style>

@section('content')
    <div class="row">
        <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header text-center"
                     style="background-image: url({{ asset('img/h9.jpg') }}); background-position: center; background-size: cover;">
                    <h3 class="widget-user-desc">Alonso Alas</h3>
                    <h5 class="widget-user-desc">Web &amp; Developer</h5>
                    <img class="text-center rounded-circle" src="{{ asset('img/user1-128x128.jpg')}}" alt="User Avatar">
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">3</h5>
                                <span class="description-text">Materias</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">13</h5>
                                <span class="description-text">Horas por semana</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">35</h5>
                                <span class="description-text">Alumnos</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.widget-user -->
        </div>

        {{--        ___________________________________________________--}}

        <div class="col-md-8">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Ajustes</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Correo Eléctronico</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail"
                                               placeholder="Correo Eléctronico">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-success">Actualizar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        {{--        ___________________________________________________--}}


    </div>
@endsection
