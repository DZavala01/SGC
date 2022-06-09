@extends('layouts.app')
@section('content')
    <h1 class="text-center">Problemas y Soluciones</h1>
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
                    <h4>Haz tu búsqueda:</h4>
                    <form action="">
                        <div class="input">
                            <input type="text" class="form-control" wire::model="searchTerm" type="text" placeholder="Búsqueda...">
                        </div>
                    </form>
                    <div class="row align-items-center">
                        <div class="col-md-3 offset-md-1 text-end">
                            <h3 class="card-title"><span class="text-black"><i class="now-ui-icons ui-1_zoom-bold"> <span></i> Búsqueda</h3>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="busqueda" name="busqueda" />
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn" style="background:#f96332"> <i
                                    class="fas fa-search"></i></button>
                            <a class="btn" style="background:#a1a1a1" href="{{ route('welcome') }}"><i
                                    class="fa fa-home"></i></a>
                            <a href="{{ route('problemasolucions.create') }}" type="submit" class="btn btn-success"><i
                                    class="fa fa-plus"></i></a>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
    @if (isset($problemas))
        @php
            $cont = 0;
        @endphp
        @foreach ($problemas as $problema)
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#p{{ $cont }}" aria-expanded="false"
                            aria-controls="p{{ $cont }}">
                            Problema {{ $problema->titulo }}
                        </button>
                    </h2>
                    <div id="p{{ $cont }}" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>Descripción:</strong> {{ $problema->descripcion }}
                            <p></p>
                            <strong>Solución:</strong> {{ $problema->solucion }}
                            <p></p>
                            <strong>¿Dónde aplica?:</strong> {{ $problema->donde_aplica }}
                            <p></p>
                            <strong>Link para más información:</strong> {{ $problema->link }}
                            <p></p>
                            <strong>Autor:</strong> {{ $problema->autor }}
                            <p></p>
                            <strong>Fecha de creación:</strong> {{ $problema->fecha_creacion }} - <strong>Fecha de
                                actualización:</strong> {{ $problema->fecha_actualizacion }}

                            <div class="row g-3 align-items-center">
                                <div class="col-md-12">
                                    <a href="{{ route('problemasolucions.edit', $problema->id) }}" type="submit"
                                        class="btn" style="background:#f96332"><i class="fa fa-pen"></i></a>
                                    <a href="{{ route('delete_problema_solucion', $problema->id) }}" type="submit"
                                        class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $cont = $cont + 1;
            @endphp
        @endforeach
    @endif
    {{-- <script>
        $(document).ready(function() {

            const input = document.getElementById('buscador');

            input.addEventListener('keyup', logKey);

            console.log($('#buscador').val());
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                console.log(page);
                fetch_data(page);

            });

            function fetch_data(page) {
                $.ajax({
                    method: 'POST',
                    data: $('#form-busqueda').serialize(),
                    url: "{{ route('buscador-problemas') }}" + "?page=" +
                        page,
                    success: function(data) {
                        $('#contenedor').html(data);
                    }
                });
            }



        });

        function logKey() {
            let search = $('#buscador').val();
            console.log(search);

            $.ajax({
                url: "{{ route('buscador-problemas') }}",
                method: 'POST',
                data: $('#form-busqueda').serialize()
            }).done(function(data) {
                $('#contenedor').html(data);
            });
        }
    </script> --}}
@endsection
