@extends('layouts.app')

@section('content')
        <div class="container">
                <div class="row">
                        <div class="col-md-6">
                                <h3>Imágenes de evidencia</h3>
                                <ul>
                                        @foreach($denuncia->imagenes as $imagen)
                                        <li>
                                                <img src="/storage/{{$imagen}}" width="300px" alt="">
                                        </li>
                                        @endforeach
                                </ul>
                        </div>
                        <div class="col-md-6">
                                <h3>Videos de evidencia</h3>
                                <ul>
                                        @foreach($denuncia->videos as $video)
                                        <li>
                                                <video width="400" controls>
                                                        <source src="/storage/{{$video}}" type="video/mp4">
                                                </video>
                                        </li>
                                        @endforeach
                                </ul>
                        </div>
                </div>
        </div>
@endsection