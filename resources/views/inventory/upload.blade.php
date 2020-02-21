@extends('layouts.app')
@section('card-title', 'Carga de inventario')
@section('card-subtitle', '')
@section('content')
	<form method="POST" id="file_form" action="{{ route('uploadFile') }}"  enctype="multipart/form-data">
  	@csrf
  	<div class="container-fluid">
	    <div class="card">
		    <div class="card-header d-flex justify-content-center bg-primary">
        	<h5> 
            <b class="text-white"><i class="fas fa-file links fa-md text-center"></i> Adjuntar archivo</b>
          </h5>
        </div>
        <div class="card-body mt-5 pt-5 mb-5 pb-5">
          <div class="form-row align-items-center justify-content-center">
            <div class="col-sm-3 my-1">
              <label class="my-1 mr-2" for="entity">Sleccione el ente</label>
              <select name="entity" id="entity" class="custom-select">
                <option value="0" disabled selected>Seleccione...</option>
                @foreach($entities as $entity)
                  <option value="{{$entity->id}}">{{$entity->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-sm-3 my-1">
              <label class="my-1 mr-2">Seleccionar el archivo del inventario</label>
              <div class="custom-file">
                <input type="file" id="file" name="file" class="custom-file-input" lang="es">
                <label class="custom-file-label" for="file"><i class="fas fa-cloud-upload-alt text-dark"></i> Archivo .CSV del Inventario</label>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer pt-4 pb-4">
    	   	<div class="text-center">
            <button type="submit" class="btn btn-info"><b><i class="fas fa-check-circle fa-lg"></i> Enviar</b></button>
            <a type="button" href="{{ route('home') }}" class="btn btn-danger text-white"><b><i class="fas fa-check-circle fa-lg"></i> Cancelar</b></a>
          </div>
        </div>
		  </div>
    </div>	
	</form>
@endsection