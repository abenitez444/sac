@extends('layouts.app')
@section('card-title', 'Inicio')
@section('card-subtitle', 'Pagina de inicio')
@section('content')
    <!-- Sidebar - Brand -->
<div class="row mt-5">
	<div class="col-sm-8 col-md-12 col-lg-12 mt-5 form-group">	
	  <a class="sidebar-brand d-flex align-items-center justify-content-center text-dark fa-lg" href="{{ route('home') }}">
	    <div class="sidebar-brand-icon rotate-n-15 ">
	      <i class="fas fa-atlas"></i>
	    </div>
	    <div class="sidebar-brand-text mx-3 text-dark font-weight-bold">Gestión de condóminio y (GCA)</div>
	  </a>
	</div>
</div>
@endsection
