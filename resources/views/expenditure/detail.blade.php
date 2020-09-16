@extends('layouts.app')
@section('card-subtitle', '')
@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/form-styles.css') }}">
@endsection
<form id="addExpenditure" name="addExpenditure" method="POST">
  @csrf
<input type="hidden" name="id" >
<div class="row  justify-content-center">
  <div class="col-sm-8 col-md-11 col-lg-11">
    <div class="card">
      <div class="card-header aqua-gradient text-white">
        <h5 class="font-weight-bold text-center"><i class="far fa-list-alt fa-lg"></i> Registro de Gástos Mensuales</h5>
      </div>
      
   

</form>  
@endsection
@section('js')

@endsection