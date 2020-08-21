
@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/form-styles.css') }}">
@endsection
@section('card-title', 'Consulta')
@section('card-button')
<div class="d-none d-sm-inline-block btn-icon-split">
    <span class="btn aqua-gradient btn-rounded" id="btn-newCo-owner" data-toggle="modal" data-target="#modal-createCo-owner"> <i class="fas fa-plus fa-lg text-white font-weight-bold"></i>
     </span>
</div>
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-header blue-gradient">
    <h6 class="font-weight-bold text-white"><i class="fas fa-fw fa-users fa-lg" title="Registrar Gásto Mensual."></i> Registro de Gástos Mensuales</h6>
  </div>
  <div class="card-body">
    <div class="col-sm-8 col-md-6 col-lg-6">
      
    </div>
  </div>
</div>

@include('expenditure.store')
@endsection

@section('js')


<script src="{{ asset('js/Spanish.json') }}"></script>
<script src="{{ asset('js/selectSearch.js') }}"></script>

@endsection