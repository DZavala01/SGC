@extends('layouts.app')
@section('content')
<h1 class="text-center">Manuales y Guías</h1>
    <div class="col-md-12">
        <div class="card card-chart">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <form action="#" method="POST" enctype="multipart/form-data" class="col-12">
                    {!! csrf_field() !!}

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>Debe de escribir un criterio de búsqueda</ul>
                        </div>
                    @endif

                    <br>
                    <div class="row align-items-center">
                        <div class="col-md-3 offset-md-1 text-end">
                            <h3 class="card-title"><span class="text-dark"><i
                                        class="now-ui-icons ui-1_zoom-bold"></span></i> Búsqueda</h3>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="busqueda" name="busqueda" />
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn" style="background:#f96332"> <i class="fas fa-search"></i></button>
                            <a class="btn" style="background:#a1a1a1"href="{{ route('welcome') }}"> <i class="fa fa-home"></i></a>
                            <a href="{{ route('manualesguias.create') }}" type="submit" class="btn btn-success"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
    @if (isset($manuales_guias))
        <div class="row">
            @foreach ($manuales_guias as $manuales_guias)
                <div class="col-sm-4 p-1 m-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><b>{{ $manuales_guias->titulo }}</b></h5>
                            <p class="card-text"><b>Descripción:</b> {{ $manuales_guias->descripcion }}
                                <br>
                                <b>Aplicación:</b> {{ $manuales_guias->donde_aplica }}
                            <br>
                                <b>Más info:</b> {{ $manuales_guias->link}}
                            <br>
                                <b>Autor:</b> {{ $manuales_guias->autor}}
                            </p>
                            <a href="{{ route('manualesguias.edit', $manuales_guias->id) }}" type="submit" class="btn" style="background:#f96332"> <i class="fa fa-pen"></i></a>
                                <a href="{{ route('delete_manuales_guia', $manuales_guias->id) }}" type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                                <a class="btn btn-primary  " href="{{ $manuales_guias->archivo }}" download=""> <i class="fa fa-download"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
