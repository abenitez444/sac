@extends('layouts.app')
@section('card-title', $employee->name)
@section('card-subtitle', '')
@section('content')
<div class="card">
  <div class="card-header bg-primary text-white">
    <h4 class="font-weight-bold">Detalle de personal</h4>
  </div>
  <div class="card-body">
    <div class="row justify-content-center">
      <div class="col-auto">
        
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