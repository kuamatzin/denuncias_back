@extends('layouts.app')

@section('content')
        <div class="container">
                <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                                <table class="table">
                                        <thead>
                                                <tr>
                                                        <th>Nombre Denuncia</th>
                                                        <th>Descripción</th>
                                                        <th>Nombre</th>
                                                        <th>Apellidos</th>
                                                        <th>Email</th>
                                                        <th>Ver imágenes</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                @foreach($denuncias as $denuncia)
                                                        <tr>
                                                                <td>{{$denuncia->nombre_denuncia}}</td>
                                                                <td>{{$denuncia->descripcion}}</td>
                                                                <td>{{$denuncia->nombre}}</td>
                                                                <td>{{$denuncia->apellidos}}</td>
                                                                <td>{{$denuncia->email}}</td>
                                                                <td>
                                                                        <a href="/denuncias/{{$denuncia->id}}" class="btn btn-primary">Ver imágenes</a>
                                                                </td>
                                                        </tr>
                                                @endforeach
                                        </tbody>
                                </table>
                        </div>
                </div>
        </div>
        
@endsection