<?php

namespace App\Http\Controllers;

use App\Models\Documentacion;
use App\Models\ManualesGuias;
use Illuminate\Http\Request;

class ManualesGuiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manuales_guias = Documentacion::where('tipo','manuales_guias')->where('activo', 1)->get();
        return view('manuales_guias.index',compact('manuales_guias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manuales_guias.create');
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

        $manuales_guias = new Documentacion();
        $manuales_guias->titulo = $request->input('titulo');
        $manuales_guias->tipo = $request->input('tipo');
        $manuales_guias->descripcion = $request->input('descripcion');
        $manuales_guias->donde_aplica = $request->input('donde_aplica');
        $manuales_guias->solucion = $request->input('solucion');
        $manuales_guias->link = $request->input('link');
        $manuales_guias->fecha_creacion = $request->input('fecha_creacion');
        $manuales_guias->fecha_actualizacion = $request->input('fecha_actualizacion');
        $manuales_guias->autor = $request->input('autor');

        //return $_FILES;
            $filename = $_FILES["archivo"]["name"];
            $filetmp = $_FILES["archivo"]["tmp_name"];
            // rename image
            $div = explode('.', $filename);
            $file_ext = strtolower(end($div));
            $unique_name = substr(md5(time()), 0,10).'.'.$file_ext;
            $path = "../public/storage/Manuales_guias/".$filename;
            move_uploaded_file($filetmp,$path);

        $manuales_guias->archivo = $path;
        //return $manuales_guias;
        $manuales_guias->save();
        //
        // $log = new Log();
        // $log->tabla = "documentacions";
        // $mov = "";
        // $mov = $mov . " titulo" . $manuales_guias->titulo . " tipo" . $manuales_guias->tipo . " descripcion" . $manuales_guias->descripcion. " donde_aplica" . $manuales_guias->donde_aplica . " solucion" . $manuales_guias->solucion . " link" . $manuales_guias->link. " fecha_creacion" . $manuales_guias->fecha_creacion . " fecha_actualizacion" . $manuales_guias->fecha_actualizacion . " autor" . $manuales_guias->autor;
        // $log->movimiento = $mov;
        // $log->usuario_id = Auth::user()->id;
        // $log->acciones = "Insercion";
        // $log->save();
        //
        return redirect('manualesguias')->with(array(
            'message' => 'El Manual/Guía se guardó Correctamente'
        ));
        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ManualesGuias  $manualesGuias
     * @return \Illuminate\Http\Response
     */
    public function show(ManualesGuias $manualesGuias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ManualesGuias  $manualesGuias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manuales_guias = Documentacion::find($id);
        return view('manuales_guias.edit')->with('manuales_guias', $manuales_guias);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ManualesGuias  $manualesGuias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $this->validate($request, [
            // 'area' => 'required',
        ]);

        $manuales_guias = Documentacion::find($id);
        $manuales_guias->titulo = $request->input('titulo');
        $manuales_guias->tipo = $request->input('tipo');
        $manuales_guias->descripcion = $request->input('descripcion');
        $manuales_guias->donde_aplica = $request->input('donde_aplica');
        $manuales_guias->solucion = $request->input('solucion');
        $manuales_guias->link = $request->input('link');
        $manuales_guias->fecha_creacion = $request->input('fecha_creacion');
        $manuales_guias->fecha_actualizacion = $request->input('fecha_actualizacion');
        $manuales_guias->autor = $request->input('autor');

        //return $_FILES;
        $filename = $_FILES["archivo"]["name"];
        $filetmp = $_FILES["archivo"]["tmp_name"];
        // rename image
        $div = explode('.', $filename);
        $file_ext = strtolower(end($div));
        $unique_name = substr(md5(time()), 0,10).'.'.$file_ext;
        $path = "../public/storage/Manuales_guias/".$filename;
        move_uploaded_file($filetmp,$path);
        $query = "INSERT INTO files(name,path) VALUES
        ('$filename','$path')";
        $result = mysqli_query($conn,$query);
        if (mysqli_query($conn,$query)) {
            echo "Records updated successfully.";
        } else{
            echo "ERROR: Could not able to execute $delete. " . mysqli_error($conn);
        }

        $manuales_guias->archivo = $path;

        $manuales_guias->save();
        //
        // $log = new Log();
        // $log->tabla = "documentacions";
        // $mov = "";
        // $mov = $mov . " titulo" . $manuales_guias->titulo . " tipo" . $manuales_guias->tipo . " descripcion" . $manuales_guias->descripcion. " donde_aplica" . $manuales_guias->donde_aplica . " solucion" . $manuales_guias->solucion . " link" . $manuales_guias->link. " fecha_creacion" . $manuales_guias->fecha_creacion . " fecha_actualizacion" . $manuales_guias->fecha_actualizacion . " autor" . $manuales_guias->autor;
        // $log->movimiento = $mov;
        // $log->usuario_id = Auth::user()->id;
        // $log->acciones = "Insercion";
        // $log->save();
        //
        return redirect('manualesguias')->with(array(
            'message' => 'El Manual/Guía se actualizó Correctamente'
        ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ManualesGuias  $manualesGuias
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManualesGuias $manualesGuias)
    {
        //
    }

    public function delete_manuales_guia($id)
    {
        $manuales_guias = Documentacion::find($id);
        if ($manuales_guias) {
            $manuales_guias->activo = 0;
            $manuales_guias->update();
            //
            // $mov = $mov . " titulo" . $manuales_guias->titulo . " tipo" . $manuales_guias->tipo . " descripcion" . $manuales_guias->descripcion. " donde_aplica" . $manuales_guias->donde_aplica . " solucion" . $manuales_guias->solucion . " link" . $manuales_guias->link. " fecha_creacion" . $manuales_guias->fecha_creacion . " fecha_actualizacion" . $manuales_guias->fecha_actualizacion . " autor" . $manuales_guias->autor;
            // $log->movimiento = $mov;
            // $log->usuario_id = Auth::user()->id;
            // $log->acciones = "Borrado";
            // $log->save();
            //
            return redirect()->route('manualesguias.index')->with(array(
                "message" => "El Manual/Guía se ha eliminado correctamente"
            ));
        } else {
            return redirect()->route('welcome')->with(array(
                "message" => "El Manual/Guía que trata de eliminar no existe"
            ));
        }
    }
}
