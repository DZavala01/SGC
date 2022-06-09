@extends('layouts.app')
@section('content')
<h1 class="text-center">Capacitación</h1>
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
                        <h3 class="card-title"><span class="text-warning"><i
                                    class="now-ui-icons ui-1_zoom-bold"></span></i> Búsqueda</h3>
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" id="busqueda" name="busqueda" />
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-warning"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer"></div>
    </div>
</div>
@endsection
