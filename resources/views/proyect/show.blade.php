
@extends('layouts.app')
@section('card-title', '')
@section('card-subtitle', '')
@section('content')

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <span class="navbar-brand" href="#">Proyecto</span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
    </ul>
    <span class="navbar-text">
      Navbar text with an inline element
    </span>
  </div>
</nav>
{{-- <div class="card">
  <div class="card-header bg-primary">
    <h5 class="font-weight-bold text-white">Tabla de Inventario</h5>
  </div>
  <div class="card-body">
    <div class="table-responsive">

    </div>
  </div>
</div> --}}


@endsection


@section('js')


@endsection