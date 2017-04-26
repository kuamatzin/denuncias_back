<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Denuncia;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class DenunciaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['image']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $denuncias = Denuncia::all();

        return view('denuncias.index', compact('denuncias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        //$denuncia = Denuncia::create($request->all());

        //return $denuncia;

        $name = $request->file('photo')->getClientOriginalName();

        Mail::to('kuamatzin@gmail.com')->send(new TestMail($name));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $denuncia = Denuncia::findOrFail($id);

       return view('denuncias.show', compact('denuncia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function image(Request $request)
    {
        $denuncia = $request->denuncia_id != 'new' ? Denuncia::findOrFail($request->denuncia_id) : new Denuncia;
        $imagenes = $denuncia->imagenes != null ? $denuncia->imagenes : [];
        $videos = $denuncia->videos != null ? $denuncia->videos : [];

        if($request->denuncia_id == 'new') {
            $denuncia->anonima = $request->denunciaAnonima == null ? '': $request->denunciaAnonima;
            $denuncia->nombre_denuncia = $request->nombre_denuncia;
            $denuncia->descripcion = $request->descripcion;
            $denuncia->nombre = $request->nombre;
            $denuncia->apellidos = $request->apellidos;
            $denuncia->email = $request->email;
            $denuncia->latitud = $request->latitud;
            $denuncia->direccion1 = $request->direccion1;
            $denuncia->direccion2 = $request->direccion2;
            $denuncia->codigo_postal = $request->codigo_postal;
            $denuncia->estado = $request->estado;
            $denuncia->municipio = $request->municipio;
            $denuncia->fecha = $request->fecha;
            $denuncia->imagenes = [];
            $denuncia->videos = [];
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images');
            array_push($imagenes, $path);
            $denuncia->imagenes = $imagenes;
            //Mail::to('kuamatzin@gmail.com')->send(new TestMail('completado'));
        }

        if ($request->hasFile('video')) {
            $path = $request->file('video')->store('videos');
            array_push($videos, $path);
            $denuncia->videos = $videos;
        }

        $denuncia->save();
        return $denuncia->id;
    }
}
