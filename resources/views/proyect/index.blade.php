
@extends('layouts.app')
@section('card-title', 'Gestion de Proyectos')
@section('card-button')
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> 
        Registrar Proyecto
    </a>
@endsection
@section('content')
<div class="card shadow mb-4">
  <div class="card-header bg-primary">
    <h5 class="font-weight-bold text-white">Lista de proyectos</h5>
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