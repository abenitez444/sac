@extends('layouts.app')
@section('card-title', 'Inventario')
@section('card-subtitle', 'Listar')
@section('content')
<div class="container-fluid">
    <form method="POST" id="formBDM">
        
    <input type="hidden" id="token" value="{{ csrf_token() }}">
    <div class="card">
        <div class="card-body">
           <div id="table" class=" table-responsive text-center">
              {!! $dataTable->table(['class' => 'table table-bordered table-hover text-center w-100'], true) !!}  
           </div>
        </div>
    </div>
</div>


@endsection


@section('js')
	<script src="/vendor/datatables/buttons.server-side.js"></script>
	{!! $dataTable->scripts() !!}
@endsection
