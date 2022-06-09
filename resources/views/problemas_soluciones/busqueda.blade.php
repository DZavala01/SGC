@if ($termino != '')
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
                                        class="btn" style="background:#f96332"><i
                                            class="fa fa-pen"></i></a>
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
@endif
