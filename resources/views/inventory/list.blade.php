@extends('layouts.app')
@section('card-title', 'Consulta del inventario')
@section('card-subtitle', '')
@section('content')

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tabla de Inventario</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      {!! $dataTable->table(['class' => 'table table-bordered table-hover text-center w-100'], true) !!} 
    </div>
  </div>
</div>


@endsection


@section('js')
	<script src="/vendor/datatables/buttons.server-side.js"></script>
	{!! $dataTable->scripts() !!}
@endsection
