@extends('layouts.app')

@section('content')
        <div class="container">
                <div class="row">
                        <div class="col-md-6">
                                <table class="table">
                                        <thead>
                                                <tr>
                                                        <th>Nombre Denuncia</th>
                                                        <th>Descripción</th>
                                                        <th></th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                @foreach($denuncias as $denuncia)
                                                        <tr>
                                                                <td>{{$denuncia->nombre_denuncia}}</td>
                                                                <td>{{$denuncia->descripcion}}</td>
                                                        </tr>
                                                @endforeach
                                        </tbody>
                                </table>
                        </div>

                        <div class="col-md-6">
                                <table class="table">
                                        <thead>
                                                <tr>
                                                        <th>Nombre</th>
                                                        <th>Apellidos</th>
                                                        <th>Email</th>
                                                        <th>Ver imágenes</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                @foreach($denuncias as $denuncia)
                                                        <tr>
                                                                <td>{{$denuncia->nombre}}</td>
                                                                <td>{{$denuncia->apellidos}}</td>
                                                                <td>{{$denuncia->email}}</td>
                                                                <td>
                                                                        <img src="storage/{{$denuncia->imagenes[0]}}" width="100px" alt="">
                                                                </td>
                                                        </tr>
                                                @endforeach
                                        </tbody>
                                </table>
                        </div>
                </div>
        </div>
        
@endsection