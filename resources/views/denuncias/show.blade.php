@extends('layouts.app')

@section('content')
        <ul>
        <li>
                <img src="storage/{{$denuncia->imagenes[0]}}" width="100px" alt="">
        </li>
        @foreach($denuncia->imagenes as $imagen)
            <li>
                <img src="storage/{{$imagen}}" width="100px" alt="">
            </li>
        @endforeach
        </ul>
@endsection