@extends('layouts.app')
@section('card-title', 'BN: '.$inventory->modelo.' #'.$inventory->serial)
@section('card-subtitle', 'detalle')
@section('content')
<div class="container">
  <table class="table">
    <tbody>
      <tr>
        <td>Ente</td>
        <td>{{$inventory->entity_id}}</td>
      </tr>
      <tr>
        <td>Dependecia administrativa</td>
        <td>{{$inventory->dependencia}}</td>
      </tr>
      <tr>
        <td>Ubicación física del bien</td>
        <td>{{$inventory->ubicacion}}</td>
      </tr>
      <tr>
        <td>Responsable del uso directo del bien</td>
        <td>{{$inventory->responsable}}</td>
      </tr>
      <tr>
        <td>Codigo interno del bien</td>
        <td>{{$inventory->codigo_interno}}</td>
      </tr>
      <tr>
        <td>Descripción</td>
        <td>{{$inventory->descripcion}}</td>
      </tr>
      <tr>
        <td>Código del serial del bien</td>
        <td>{{$inventory->serial}}</td>
      </tr>
      <tr>
        <td>Modelo del bien</td>
        <td>{{$inventory->modelo}}</td>
      </tr>
      <tr>
        <td>Marca del bien</td>
        <td>{{$inventory->marca}}</td>
      </tr>
      <tr>
        <td>Cantidad</td>
        <td>{{$inventory->cantidad}}</td>
      </tr>
      <tr>
        <td>Especificaión</td>
        <td>{{$inventory->especificacion}}</td>
      </tr>
      <tr>
        <td>Datelles</td>
        <td>{{$inventory->detalle}}</td>
      </tr>
    </tbody>
  </table>
</div>
<div class="text-center">
  {{-- <button type="button" class="btn btn-danger">Descargar este Documento</button> --}}
  <a href="{{route('list')}}" class="btn btn-primary">Volver</a>
</div>
	
@endsection