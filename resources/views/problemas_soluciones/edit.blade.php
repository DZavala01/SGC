@extends('layouts.app')
@section('content')

        <div class="container">
            @if (Auth::check())
                @if (session('message'))
                    <div class="alert alert-success">
                        <h2>{{ session('message') }}</h2>

                    </div>
                @endif

                <div class="row">
                    <h2>Editar el Problema</h2>
                    <hr>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('#js-example-basic-single').select2();
                            $('#js-example-basic-single2').select2();
                            $('#equipos').select2();
                        });
                    </script>

                </div>
                <form action="{{ route('problemasolucions.update', $problema_solucion->id)}}" method="post" enctype="multipart/form-data" class="col-12">
                    @method('PUT')
                    <div class="row">
                        <div class="col">
                            {!! csrf_field() !!}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row g-3 align-items-center">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-9">
                                        <label class="font-weight-bold" for="titulo">Problema</label>
                                        <input type="text" class="form-control" id="titulo" name="titulo" value="{{$problema_solucion->titulo}}">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="font-weight-bold" for="tipo">Tipo de Problema:</label>
                                        <select class="form-control" id="tipo" name="tipo">
                                            <option disabled selected>Elegir</option>

                                            <option  {{ ($problema_solucion->tipo =='problemas_soluciones') ? 'selected' : ''}} value="problemas_soluciones">PROBLEMAS Y SOLUCIONES</option>

                                            <option {{ ($problema_solucion->tipo =='manuales_guias') ? 'selected' : ''}} value="manuales_guias">MANUALES Y GUÍAS</option>

                                            <option  {{ ($problema_solucion->tipo =='capacitacion') ? 'selected' : ''}} value="capacitacion">CAPACITACIÓN</option>

                                            <option {{ ($problema_solucion->tipo =='documentacion') ? 'selected' : ''}} value="documentacion">DOCUMENTACIÓN</option>

                                        </select>
                                    </div>
                                    <div class="col-md-9">
                                        <label class="font-weight-bold" for="descripcion">Descripción</label>
                                        <input type="text"  style="width : px; heigth : 100px" class="form-control" id="descripcion" name="descripcion" value="{{$problema_solucion->descripcion}}">
                                    </div>

                                    <div class="col-md-3">
                                        <label class="font-weight-bold" for="donde_aplica">¿Dónde aplica?</label>
                                        <input type="text" class="form-control" id="donde_aplica" name="donde_aplica" value="{{$problema_solucion->donde_aplica}}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="font-weight-bold" for="solucion">Solución</label>
                                        <input type="text" class="form-control" id="solucion" name="solucion" value="{{$problema_solucion->solucion}}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="font-weight-bold" for="link">Link para mayor información</label>
                                        <input type="text" class="form-control" id="link" name="link" value="{{$problema_solucion->link}}">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="fecha_creacion">Fecha de creación:</label>
                                        <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion" value="{{$problema_solucion->fecha_creacion}}" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="fecha_actualizacion">Fecha de actualización:</label>
                                        <input type="date" class="form-control" id="fecha_actualizacion" name="fecha_actualizacion" value="{{$problema_solucion->fecha_actualizacion}}" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="font-weight-bold" for="autor">Autor:</label>
                                        <input type="text" class="form-control" id="autor" name="autor" value="{{$problema_solucion->autor}}">
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row g-3 align-items-center">
                                <div class="col-md-12">
                                    <a href="{{ route('welcome') }}" class="btn btn-danger">Cancelar</a>
                                    <button type="submit" class="btn btn-success">Guardar datos</button>
                                </div>
                            </div>
                        </div>
                        <br>

                    </div>
                </form>
                <br>
                <div class="row g-5 align-items-center">

                    <br>
                    <h5>En caso de inconsistencias, favor de reportarlas.</h5>
                    <hr>

                </div>

        </div>
@else
    Acceso No válido
    @endif
@endsection

