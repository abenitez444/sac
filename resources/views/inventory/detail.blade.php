@extends('layouts.app')
@section('card-title', 'BN: #'.$inventory->serial)
@section('card-subtitle', '')
@section('content')
<div class="card">
  <div class="card-header bg-primary text-white">
    <h4 class="font-weight-bold">Detalle del bien</h4>
  </div>
  <div class="card-body">
    <div class="row justify-content-center">
      <div class="col-auto">
        <table class="table table-borderless">
          <tbody>
            <tr>
              <th>Ente</th>
              <td>{{$inventory->entity_id}}</td>
            </tr>
            <tr>
              <th>Dependecia administrativa</th>
              <td>{{$inventory->dependencia}}</td>
            </tr>
            <tr>
              <th>Ubicación física del bien</th>
              <td>{{$inventory->ubicacion}}</td>
            </tr>
            <tr>
              <th>Responsable del uso directo del bien</th>
              <td>{{$inventory->responsable}}</td>
            </tr>
            <tr>
              <th>Codigo interno del bien</th>
              <td>{{$inventory->codigo_interno}}</td>
            </tr>
            <tr>
              <th>Descripción</th>
              <td>{{$inventory->descripcion}}</td>
            </tr>
            <tr>
              <th>Código del serial del bien</th>
              <td>{{$inventory->serial}}</td>
            </tr>
            <tr>
              <th>Modelo del bien</th>
              <td>{{$inventory->modelo}}</td>
            </tr>
            <tr>
              <th>Marca del bien</th>
              <td>{{$inventory->marca}}</td>
            </tr>
            <tr>
              <th>Cantidad</th>
              <td>{{$inventory->cantidad}}</td>
            </tr>
            <tr>
              <th>Especificaión</th>
              <td>{{$inventory->especificacion}}</td>
            </tr>
            <tr>
              <th>Datelles</th>
              <td>{{$inventory->detalle}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="card-footer">
    <div class="text-center">
  {{-- <button type="button" class="btn btn-danger">Descargar este Documento</button> --}}
  <a href="{{route('list')}}" class="btn btn-primary">Volver</a>
</div>
  </div>
</div>
	
@endsection