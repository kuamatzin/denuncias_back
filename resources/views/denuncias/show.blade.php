@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
                <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-primary">
                                <div class="panel-heading">
                                        <h2>Información de denuncia</h2>
                                </div>
                                <div class="panel-body">
                                        <div class="table-responsive">
                                                <table class="table table-hover">
                                                        <tbody>
                                                                <tr>
                                                                        <td class="pinfo">¿A quién denuncian?</td>
                                                                        <td class="pinfo">{{$denuncia->nombre_denuncia}}</td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="pinfo">Descripción</td>
                                                                        <td class="pinfo">{{$denuncia->descripcion}}</td>
                                                                </tr>
                                                        </tbody>
                                                </table>
                                        </div>
                                </div>
                        </div>
                        
                        <hr>
                        <h3>¿Dónde fue el acto delictivo?</h3>
                        <div id="map" style="width: 100%; height: 400px"></div>
                        <div class="row">
                                <div class="col-md-6">
                                        <h3>Imágenes de evidencia</h3>
                                        @foreach($denuncia->imagenes as $imagen)
                                        <img src="/storage/{{$imagen}}" class="img-responsive">
                                        <br><br>
                                        @endforeach
                                </div>
                                <div class="col-md-6">
                                        <h3>Videos de evidencia</h3>
                                        @foreach($denuncia->videos as $video)
                                        <video width="100%" controls>
                                                <source src="/storage/{{$video}}" type="video/mp4">
                                        </video>
                                        <br><br>
                                        @endforeach
                                </div>
                        </div>
                </div>
        </div>
</div>
@endsection
@section('scripts')
<script>
function initMap() {
var uluru = {lat: {{$denuncia->latitud}}, lng: {{$denuncia->longitud}}};
var map = new google.maps.Map(document.getElementById('map'), {
zoom: 16,
center: uluru
});
var marker = new google.maps.Marker({
position: uluru,
map: map
});
}
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWOo-8mcf_yhCOdzc-D9oE41D4dis6HVM&callback=initMap">
</script>
@endsection