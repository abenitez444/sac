
@extends('layouts.app')
@section('card-title', '')
@section('card-button', '')
@section('sub-narbar')
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary m-1 shadow-lg p-3 mb-5 rounded">
  <span class="navbar-brand">{{ $proyect->name }}</span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
{{--       <li class="nav-item">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li> --}}
    </ul>
    <span class="text-white font-weight-bold">
      TIPO: {{ $proyect->type->description }}
    </span>
  </div>
</nav>
@endsection
@section('content')

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
<script type="text/javascript">
  $(document).ready(function($) {
    $("body").addClass("sidebar-toggled");
    $(".sidebar").addClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });
</script>

@endsection