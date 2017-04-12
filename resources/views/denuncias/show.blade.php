@extends('layouts.app')

@section('content')
        <ul>
        @foreach($denuncia->imagenes as $imagen)
            <li>
                <img src="storage/{{$imagen}}" width="100px" alt="">
            </li>
        @endforeach
        </ul>
@endsection