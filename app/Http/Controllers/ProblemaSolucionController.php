<?php

namespace App\Http\Controllers;

use App\Models\Documentacion;
use App\Models\ProblemaSolucion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Log;
use Livewire\Livewire;


class ProblemaSolucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $problemas = Documentacion::where('tipo','problemas_soluciones')->where('activo', 1)->get();
        return view('problemas_soluciones.index',compact('problemas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('problemas_soluciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $this->validate($request, [
            // 'area' => 'required',
        ]);

        $problema_solucion = new Documentacion();
        $problema_solucion->titulo = $request->input('titulo');
        $problema_solucion->tipo = $request->input('tipo');
        $problema_solucion->descripcion = $request->input('descripcion');
        $problema_solucion->donde_aplica = $request->input('donde_aplica');
        $problema_solucion->solucion = $request->input('solucion');
        $problema_solucion->link = $request->input('link');
        $problema_solucion->fecha_creacion = $request->input('fecha_creacion');
        $problema_solucion->fecha_actualizacion = $request->input('fecha_actualizacion');
        $problema_solucion->autor = $request->input('autor');

        $problema_solucion->save();
        //
        // $log = new Log();
        // $log->tabla = "documentacions";
        // $mov = "";
        // $mov = $mov . " titulo" . $problema_solucion->titulo . " tipo" . $problema_solucion->tipo . " descripcion" . $problema_solucion->descripcion. " donde_aplica" . $problema_solucion->donde_aplica . " solucion" . $problema_solucion->solucion . " link" . $problema_solucion->link. " fecha_creacion" . $problema_solucion->fecha_creacion . " fecha_actualizacion" . $problema_solucion->fecha_actualizacion . " autor" . $problema_solucion->autor;
        // $log->movimiento = $mov;
        // $log->usuario_id = Auth::user()->id;
        // $log->acciones = "Insercion";
        // $log->save();
        //
        return redirect('problemasolucions')->with(array(
            'message' => 'El problema se guardó Correctamente'
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProblemaSolucion  $problemaSolucion
     * @return \Illuminate\Http\Response
     */
    public function show(ProblemaSolucion $problemaSolucion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProblemaSolucion  $problemaSolucion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $problema_solucion = Documentacion::find($id);
        return view('problemas_soluciones.edit')->with('problema_solucion', $problema_solucion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProblemaSolucion  $problemaSolucion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $this->validate($request, [
            // 'area' => 'required',
        ]);

        $problema_solucion = Documentacion::find($id);
        $problema_solucion->titulo = $request->input('titulo');
        $problema_solucion->tipo = $request->input('tipo');
        $problema_solucion->descripcion = $request->input('descripcion');
        $problema_solucion->donde_aplica = $request->input('donde_aplica');
        $problema_solucion->solucion = $request->input('solucion');
        $problema_solucion->link = $request->input('link');
        $problema_solucion->fecha_creacion = $request->input('fecha_creacion');
        $problema_solucion->fecha_actualizacion = $request->input('fecha_actualizacion');
        $problema_solucion->autor = $request->input('autor');

        $problema_solucion->save();
        //
        // $log = new Log();
        // $log->tabla = "documentacions";
        // $mov = "";
        // $mov = $mov . " titulo" . $problema_solucion->titulo . " tipo" . $problema_solucion->tipo . " descripcion" . $problema_solucion->descripcion. " donde_aplica" . $problema_solucion->donde_aplica . " solucion" . $problema_solucion->solucion . " link" . $problema_solucion->link. " fecha_creacion" . $problema_solucion->fecha_creacion . " fecha_actualizacion" . $problema_solucion->fecha_actualizacion . " autor" . $problema_solucion->autor;
        // $log->movimiento = $mov;
        // $log->usuario_id = Auth::user()->id;
        // $log->acciones = "Insercion";
        // $log->save();
        //
        return redirect('problemasolucions')->with(array(
            'message' => 'El problema se actualizó Correctamente'
        ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProblemaSolucion  $problemaSolucion
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProblemaSolucion $problemaSolucion)
    {
        //
    }

    public function delete_problema_solucion($id)
    {
        $problema_solucion = Documentacion::find($id);
        if ($problema_solucion) {
            $problema_solucion->activo = 0;
            $problema_solucion->update();
            //
            // $mov = $mov . " titulo" . $problema_solucion->titulo . " tipo" . $problema_solucion->tipo . " descripcion" . $problema_solucion->descripcion. " donde_aplica" . $problema_solucion->donde_aplica . " solucion" . $problema_solucion->solucion . " link" . $problema_solucion->link. " fecha_creacion" . $problema_solucion->fecha_creacion . " fecha_actualizacion" . $problema_solucion->fecha_actualizacion . " autor" . $problema_solucion->autor;
            // $log->movimiento = $mov;
            // $log->usuario_id = Auth::user()->id;
            // $log->acciones = "Borrado";
            // $log->save();
            //
            return redirect()->route('problemasolucions.index')->with(array(
                "message" => "El problema se ha eliminado correctamente"
            ));
        } else {
            return redirect()->route('welcome')->with(array(
                "message" => "El problema que trata de eliminar no existe"
            ));
        }
    }

    public function buscador(Request $request)
    {
        if ($request->ajax()) {
            $consulta = Documentacion::select('id', 'tipo', 'titulo', 'descripcion', 'donde_aplica','solucion','activo')
            ->where('tipo', 'like', '%' . $request->buscador . '%')
            ->orwhere('titulo', 'like', '%' . $request->buscador . '%')
            ->orwhere('descripcion', 'like', '%' . $request->buscador . '%')
            ->orwhere('donde_aplica', 'like', '%' . $request->buscador . '%')
            ->orwhere('solucion', 'like', '%' . $request->buscador . '%')->get();
            $termino = $request->buscador;
            return view('problemas_soluciones.busqueda', compact('consulta', 'termino'))->render();
        }
    }
    public $searchTerm;

    public function search()
    {
        $searchTerm = '%' . $this->searchTerm. '%';
        return Documentacion::where('name', 'like',$searchTerm)
            ->orwhere('titulo', 'like',$searchTerm)
            ->orwhere('descripcion', 'like',$searchTerm)
            ->orwhere('donde_aplica', 'like',$searchTerm)
            ->orwhere('solucion', 'like',$searchTerm)->get();
    }
}


