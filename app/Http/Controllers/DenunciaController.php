<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Denuncia;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class DenunciaController extends Controller
{
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
        //
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

        if ($request->hasFile('image')) {

            $name = $request->file('image')->store('images');

            $nombre  = $request->nombre;

            Mail::to('kuamatzin@gmail.com')->send(new TestMail($nombre));
        }
        
        else {
            Mail::to('kuamatzin@gmail.com')->send(new TestMail('No se subio la foto'));
        }
        
    }
}
